@extends('layouts.app')

@section('content')
    @php
        $metrics = [
            [
                'label' => 'Total Documents',
                'value' => '128',
                'change' => '+12 this week',
                'icon' => 'fa-file-lines',
                'color' => 'bg-brand-50 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400',
            ],
            [
                'label' => 'Indexed Documents',
                'value' => '104',
                'change' => '81% ready',
                'icon' => 'fa-circle-check',
                'color' => 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-400',
            ],
            [
                'label' => 'Document Chunks',
                'value' => '9,842',
                'change' => '+684 indexed',
                'icon' => 'fa-layer-group',
                'color' => 'bg-sky-50 text-sky-500 dark:bg-sky-500/15 dark:text-sky-400',
            ],
            [
                'label' => 'Questions Asked',
                'value' => '1,284',
                'change' => '+18% vs last week',
                'icon' => 'fa-message',
                'color' => 'bg-purple-50 text-purple-500 dark:bg-purple-500/15 dark:text-purple-400',
            ],
        ];

        $statusSummary = [
            ['label' => 'Completed', 'value' => 104, 'color' => 'success'],
            ['label' => 'Processing', 'value' => 18, 'color' => 'warning'],
            ['label' => 'Failed', 'value' => 6, 'color' => 'error'],
        ];

        $recentDocuments = [
            ['title' => 'Product Handbook.pdf', 'type' => 'application/pdf', 'size' => '2.4 MB', 'status' => 'completed', 'uploaded' => 'Today, 09:12'],
            ['title' => 'Support FAQ.txt', 'type' => 'text/plain', 'size' => '126 KB', 'status' => 'completed', 'uploaded' => 'Today, 08:40'],
            ['title' => 'Internal Policy.docx', 'type' => 'word/document', 'size' => '980 KB', 'status' => 'processing', 'uploaded' => 'Yesterday'],
            ['title' => 'Release Notes Q2.pdf', 'type' => 'application/pdf', 'size' => '1.7 MB', 'status' => 'failed', 'uploaded' => 'May 31'],
        ];

        $recentConversations = [
            ['title' => 'Product handbook Q&A', 'messages' => 18, 'last' => '2m ago'],
            ['title' => 'Support policy lookup', 'messages' => 9, 'last' => '28m ago'],
            ['title' => 'Release note summary', 'messages' => 12, 'last' => 'Yesterday'],
            ['title' => 'Internal procedure draft', 'messages' => 7, 'last' => 'May 29'],
        ];

        $topSources = [
            ['title' => 'Product Handbook.pdf', 'hits' => 246, 'percent' => 88],
            ['title' => 'Support FAQ.txt', 'hits' => 182, 'percent' => 65],
            ['title' => 'Internal Policy.docx', 'hits' => 97, 'percent' => 36],
        ];
    @endphp

    <div class="space-y-6">
        @include('pages.app.dashboard.header')
        @include('pages.app.dashboard.metric-cards', ['metrics' => $metrics])

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-[minmax(0,1fr)_380px]">
            @include('pages.app.dashboard.recent-documents', ['recentDocuments' => $recentDocuments])

            <div class="space-y-6">
                @include('pages.app.dashboard.knowledge-status', ['statusSummary' => $statusSummary])
                @include('pages.app.dashboard.top-sources', ['topSources' => $topSources])
            </div>
        </div>

        @include('pages.app.dashboard.recent-conversations', ['recentConversations' => $recentConversations])
    </div>
@endsection
