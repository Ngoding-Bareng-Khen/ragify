<section class="flex min-h-172 max-h-172 flex-col">
    @include('pages.app.ai-chat.room-header')
    @include('pages.app.ai-chat.messages', ['messages' => $messages])
    @include('pages.app.ai-chat.composer')
</section>
