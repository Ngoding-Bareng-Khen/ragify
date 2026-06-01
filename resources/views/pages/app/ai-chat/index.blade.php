@extends('layouts.app')

@section('content')
    @php
        $conversations = [
            [
                'title' => 'Product handbook Q&A',
                'preview' => 'Summarize onboarding steps for new users.',
                'time' => '2m ago',
                'active' => true,
                'unread' => 2,
            ],
            [
                'title' => 'Support policy lookup',
                'preview' => 'What should agents do after escalation?',
                'time' => '28m ago',
                'active' => false,
                'unread' => 0,
            ],
            [
                'title' => 'Release note summary',
                'preview' => 'Compare Q2 changes with last version.',
                'time' => 'Yesterday',
                'active' => false,
                'unread' => 0,
            ],
            [
                'title' => 'Internal procedure draft',
                'preview' => 'Create a checklist from uploaded DOCX.',
                'time' => 'May 29',
                'active' => false,
                'unread' => 0,
            ],
        ];

        $messages = [
            [
                'sender' => 'assistant',
                'name' => 'Ragify AI',
                'time' => '10:32',
                'body' => 'I found 4 relevant sections in Product Handbook.pdf. The onboarding flow has three main stages: account setup, workspace configuration, and first knowledge source upload.',
                'sources' => ['Product Handbook.pdf', 'Support FAQ.txt'],
            ],
            [
                'sender' => 'user',
                'name' => 'You',
                'time' => '10:34',
                'body' => 'Turn that into a short checklist for customer success.',
                'sources' => [],
            ],
            [
                'sender' => 'assistant',
                'name' => 'Ragify AI',
                'time' => '10:35',
                'body' => "Here is a concise checklist:\n1. Confirm the user can access the workspace.\n2. Verify profile and team settings.\n3. Upload the first PDF, TXT, or Word source.\n4. Ask one validation question in AI Chat.\n5. Document unresolved gaps for follow-up.",
                'sources' => ['Product Handbook.pdf'],
            ],
            [
                'sender' => 'assistant',
                'name' => 'Ragify AI',
                'time' => '10:35',
                'body' => "Here is a concise checklist:\n1. Confirm the user can access the workspace.\n2. Verify profile and team settings.\n3. Upload the first PDF, TXT, or Word source.\n4. Ask one validation question in AI Chat.\n5. Document unresolved gaps for follow-up.",
                'sources' => ['Product Handbook.pdf'],
            ],
            [
                'sender' => 'assistant',
                'name' => 'Ragify AI',
                'time' => '10:35',
                'body' => "Here is a concise checklist:\n1. Confirm the user can access the workspace.\n2. Verify profile and team settings.\n3. Upload the first PDF, TXT, or Word source.\n4. Ask one validation question in AI Chat.\n5. Document unresolved gaps for follow-up.",
                'sources' => ['Product Handbook.pdf'],
            ],
        ];
    @endphp

    <div class="space-y-6">
        <div class="grid min-h-[calc(100vh-220px)] grid-cols-1 overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3 lg:grid-cols-[340px_minmax(0,1fr)]">
            @include('pages.app.ai-chat.conversation-list', ['conversations' => $conversations])
            @include('pages.app.ai-chat.room', ['messages' => $messages])
        </div>
    </div>
@endsection
