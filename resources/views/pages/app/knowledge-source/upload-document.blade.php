<x-ui.modal modal-id="knowledge-source-upload-modal" class="max-w-180 p-6 lg:p-8">
    <div x-data="knowledgeSourceDocomentsUploader()" @documents-selected.window="setFiles($event.detail.files)">
        <div class="pr-12">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Upload Documents</h3>
            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Add PDF, TXT, DOC, or DOCX files to Ragify
                knowledge source.</p>
        </div>

        <div x-show="uploading" class="mt-4" x-cloak>
            <p class="text-theme-sm text-gray-500">
                Total progress:
                <span x-text="`${totalProgress}%`"></span>

            </p>
        </div>

        <form @submit.prevent="uploadDocuments()" class="mt-6 space-y-6">
            @csrf

            <x-form.dropzone name="files" />

            <div
                class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 dark:border-gray-800 sm:flex-row sm:justify-end">
                <x-ui.button type="reset" variant="outline" size="none" className="h-11 px-5 text-theme-sm">
                    Reset
                </x-ui.button>
                <x-ui.button type="submit" variant="primary" size="none" className="h-11 px-5 text-theme-sm"
                    x-bind:disabled="uploading">
                    <i class="fa-solid fa-upload text-sm"></i>
                    <span x-show="!uploading">Upload</span>
                    <span x-show="uploading" x-cloak>Uploading...</span>
                </x-ui.button>
            </div>
        </form>
    </div>
</x-ui.modal>

@push('scripts')
    @vite('resources/js/knowledge-source/upload-documents.js')
@endpush
