<?php

namespace App\Jobs\Document;

use App\Models\Document;
use App\Repositories\DocumentChunkRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class ProcessDocumentJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly DocumentChunkRepository $documentChunkRepository,
        public Document $document
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $document = $this->document->fresh();

        try {
            $absolutePath = Storage::disk('local')->path($document->file_path);
            $text = $this->extractText($absolutePath, $document->mime_type);
            $chunks = $this->splitText($text);

            foreach ($chunks as $index => $content) {
                $this->documentChunkRepository->create([
                    'document_id' => $document->id,
                    'chunk_index' => $index,
                    'content' => $content,
                    'embedding' => null,
                ]);
            }

            $document->forceFill([
                'status' => 'completed',
            ])->save();

        } catch (\Throwable $e) {
            $document->forceFill([
                'status' => 'failed',
                'failure_reason' => $e->getMessage(),
            ])->save();

            throw $e;
        }
    }

    private function extractText(string $path, string $mimeType): string
    {

        if ($mimeType === 'text/plain') {
            return file_get_contents($path);
        }

        return "Dummy extracted text from {$path}";

    }

    private function splitText(string $text, int $size = 1000, int $overlap = 150): array
    {
        $text = preg_replace('/\s+/', ' ', trim($text));

        if ($text === '') {
            return [];
        }

        $chunks = [];
        $start = 0;
        $length = mb_strlen($text);

        while ($start < $length) {
            $chunks[] = mb_substr($text, $start, $size);
            $start += $size - $overlap;
        }

        return $chunks;
    }
}
