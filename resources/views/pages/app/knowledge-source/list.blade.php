@extends('layouts.app')

@section('content')
    @php
        $documents = [
            [
                'name' => 'Product Handbook.pdf',
                'type' => 'PDF',
                'icon' => 'fa-file-pdf',
                'iconClass' => 'bg-error-50 text-error-500 dark:bg-error-500/15',
                'size' => '2.4 MB',
                'chunks' => 184,
                'uploadedAt' => 'May 31, 2026',
                'status' => 'Indexed',
                'statusClass' => 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/15 dark:text-emerald-400',
            ],
            [
                'name' => 'Support FAQ.txt',
                'type' => 'TXT',
                'icon' => 'fa-file-lines',
                'iconClass' => 'bg-gray-100 text-gray-600 dark:bg-white/5 dark:text-gray-300',
                'size' => '126 KB',
                'chunks' => 42,
                'uploadedAt' => 'May 30, 2026',
                'status' => 'Indexed',
                'statusClass' => 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/15 dark:text-emerald-400',
            ],
            [
                'name' => 'Internal Policy.docx',
                'type' => 'Word',
                'icon' => 'fa-file-word',
                'iconClass' => 'bg-blue-50 text-blue-600 dark:bg-blue-500/15 dark:text-blue-400',
                'size' => '980 KB',
                'chunks' => 76,
                'uploadedAt' => 'May 29, 2026',
                'status' => 'Processing',
                'statusClass' => 'bg-amber-50 text-amber-600 dark:bg-amber-500/15 dark:text-amber-400',
            ],
            [
                'name' => 'Release Notes Q2.pdf',
                'type' => 'PDF',
                'icon' => 'fa-file-pdf',
                'iconClass' => 'bg-error-50 text-error-500 dark:bg-error-500/15',
                'size' => '1.7 MB',
                'chunks' => 113,
                'uploadedAt' => 'May 28, 2026',
                'status' => 'Failed',
                'statusClass' => 'bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-400',
            ],
        ];

        $totalChunks = collect($documents)->sum('chunks');
    @endphp

    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-title-sm font-semibold text-gray-800 dark:text-white/90">Knowledge Source</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Manage uploaded PDF, TXT, and Word documents used by Ragify.</p>
            </div>

            <x-ui.button
                type="button"
                variant="primary"
                size="none"
                x-on:click="$dispatch('open-modal', 'knowledge-source-upload-modal')"
                className="h-11 px-4 text-sm">
                <i class="fa-solid fa-upload"></i>
                Upload Document
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
                <p class="text-sm text-gray-500 dark:text-gray-400">Documents</p>
                <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white/90">{{ count($documents) }}</p>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
                <p class="text-sm text-gray-500 dark:text-gray-400">Indexed Chunks</p>
                <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white/90">{{ number_format($totalChunks) }}</p>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3">
                <p class="text-sm text-gray-500 dark:text-gray-400">Supported Files</p>
                <p class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white/90">PDF, TXT, DOCX</p>
            </div>
        </div>

        @include('pages.app.knowledge-source.datatable', ['documents' => $documents])
        @include('pages.app.knowledge-source.filter')
        @include('pages.app.knowledge-source.upload-document')
    </div>
@endsection
