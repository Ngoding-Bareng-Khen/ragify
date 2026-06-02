<?php

namespace App\Jobs\Document;

use App\Models\Document;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class MergeDocumentChunksJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Document $document
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $document = $this->document->fresh();
        $extension = pathinfo($document->original_file_name, PATHINFO_EXTENSION);

        $finalPath = "documents/{$document->id}.{$extension}";
        $absoluteFinalPath = Storage::disk('local')->path($finalPath);

        if (! is_dir(dirname($absoluteFinalPath))) {
            mkdir(dirname($absoluteFinalPath), 0755, true);
        }

        $output = fopen($absoluteFinalPath, 'wb');

        try {
            for ($i = 0; $i < $document->total_chunks; $i++) {
                $chunkPath = Storage::disk('local')->path("{$document->temporary_path}/{$i}.part");

                if (! file_exists($chunkPath)) {
                    throw new \RuntimeException("Missing chunk {$i}");
                }

                fwrite($output, file_get_contents($chunkPath));
            }

            fclose($output);

            Storage::disk('local')->deleteDirectory($document->temporary_path);

            $document->forceFill([
                'file_path' => $finalPath,
                'status' => 'processing',
            ])->save();

            // ProcessDocumentJob::dispatch($document);

        } catch (\Throwable $e) {
            if (is_resource($output)) {
                fclose($output);
            }

            $document->forceFill([
                'status' => 'failed',
                'failure_reason' => $e->getMessage(),
            ])->save();

            throw $e;
        }
    }
}
