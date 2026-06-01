@props([
    'name' => 'documents',
    'multiple' => true,
    'accept' => '.pdf,.txt,.doc,.docx,application/pdf,text/plain,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
])

<div
    x-data="{
        isDragging: false,
        files: [],
        errors: [],
        validExtensions: ['pdf', 'txt', 'doc', 'docx'],
        validTypes: [
            'application/pdf',
            'text/plain',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ],
        handleDrop(event) {
            this.isDragging = false;
            this.handleFiles(Array.from(event.dataTransfer.files));
        },
        handleFiles(selectedFiles) {
            this.errors = [];

            const validFiles = selectedFiles.filter(file => {
                const extension = file.name.split('.').pop().toLowerCase();
                const isValid = this.validExtensions.includes(extension) || this.validTypes.includes(file.type);

                if (!isValid) {
                    this.errors.push(`${file.name} is not supported.`);
                }

                return isValid;
            });

            this.files = [...this.files, ...validFiles];
        },
        removeFile(index) {
            this.files.splice(index, 1);
        },
        formatSize(size) {
            if (size < 1024) return `${size} B`;
            if (size < 1024 * 1024) return `${(size / 1024).toFixed(1)} KB`;
            return `${(size / 1024 / 1024).toFixed(1)} MB`;
        },
        fileIcon(file) {
            const extension = file.name.split('.').pop().toLowerCase();
            if (extension === 'pdf') return 'fa-file-pdf text-error-500';
            if (extension === 'txt') return 'fa-file-lines text-gray-500';
            return 'fa-file-word text-blue-500';
        },
    }"
    class="transition">
    <div
        @drop.prevent="handleDrop($event)"
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @click="$refs.fileInput.click()"
        :class="isDragging
            ? 'border-brand-500 bg-brand-50 dark:bg-brand-500/[0.08]'
            : 'border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-900'"
        class="cursor-pointer rounded-xl border border-dashed p-7 transition-colors lg:p-10">
        <input
            x-ref="fileInput"
            type="file"
            name="{{ $multiple ? $name . '[]' : $name }}"
            accept="{{ $accept }}"
            @if ($multiple) multiple @endif
            @change="handleFiles(Array.from($event.target.files)); $event.target.value = ''"
            class="hidden"
            @click.stop>

        <div class="flex flex-col items-center">
            <div class="mb-[22px] flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                <i class="fa-solid fa-cloud-arrow-up text-2xl"></i>
            </div>

            <h4 class="mb-3 text-center text-lg font-semibold text-gray-800 dark:text-white/90">
                <span x-show="!isDragging">Drag & Drop Documents Here</span>
                <span x-show="isDragging" x-cloak>Drop Documents Here</span>
            </h4>

            <span class="mb-5 block w-full max-w-[320px] text-center text-sm text-gray-700 dark:text-gray-400">
                Upload multiple PDF, TXT, DOC, or DOCX files for your knowledge source.
            </span>

            <span class="font-medium text-brand-500 underline text-theme-sm">
                Browse Files
            </span>
        </div>
    </div>

    <div x-show="errors.length > 0" class="mt-4 rounded-lg border border-error-500/20 bg-error-50 p-3 dark:bg-error-500/10" x-cloak>
        <template x-for="error in errors" :key="error">
            <p class="text-theme-sm text-error-500" x-text="error"></p>
        </template>
    </div>

    <div x-show="files.length > 0" class="mt-4 rounded-xl border border-gray-200 dark:border-gray-800" x-cloak>
        <div class="border-b border-gray-200 px-4 py-3 dark:border-gray-800">
            <h5 class="text-theme-sm font-semibold text-gray-700 dark:text-gray-300">Selected Documents</h5>
        </div>

        <ul class="divide-y divide-gray-100 dark:divide-gray-800">
            <template x-for="(file, index) in files" :key="`${file.name}-${index}`">
                <li class="flex items-center justify-between gap-3 px-4 py-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 dark:bg-white/5">
                            <i class="fa-solid text-lg" :class="fileIcon(file)"></i>
                        </span>
                        <div class="min-w-0">
                            <p class="truncate text-theme-sm font-medium text-gray-800 dark:text-white/90" x-text="file.name"></p>
                            <p class="text-theme-xs text-gray-500 dark:text-gray-400" x-text="formatSize(file.size)"></p>
                        </div>
                    </div>

                    <x-ui.button
                        x-on:click.stop="removeFile(index)"
                        type="button"
                        variant="danger"
                        size="none"
                        className="flex h-8 w-8 shrink-0"
                        aria-label="Remove file">
                        <i class="fa-solid fa-xmark"></i>
                    </x-ui.button>
                </li>
            </template>
        </ul>
    </div>
</div>
