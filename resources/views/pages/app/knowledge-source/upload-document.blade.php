<x-ui.modal modal-id="knowledge-source-upload-modal" class="max-w-180 p-6 lg:p-8">
    <div class="pr-12">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">Upload Documents</h3>
        <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">Add PDF, TXT, DOC, or DOCX files to Ragify knowledge source.</p>
    </div>

    <form class="mt-6 space-y-6">
        <x-form.dropzone name="documents" />

        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 dark:border-gray-800 sm:flex-row sm:justify-end">
            <x-ui.button type="reset" variant="outline" size="none" className="h-11 px-5 text-theme-sm">
                Reset
            </x-ui.button>
            <x-ui.button type="button" variant="primary" size="none" className="h-11 px-5 text-theme-sm" x-on:click="open = false">
                <i class="fa-solid fa-upload text-sm"></i>
                Upload Documents
            </x-ui.button>
        </div>
    </form>
</x-ui.modal>
