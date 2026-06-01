window.knowledgeSourceDocomentsUploader = function () {
    return {
        files: [],
        uploading: false,
        totalProgress: 0,
        chunkSize: 5 * 1024 * 1024, // 5 MB

        setFiles(files) {
            this.files = files.map((file) => ({
                id: crypto.randomUUID(),
                file,
                uploadId: crypto.randomUUID(),
                progress: 0,
            }));
        },

        async uploadDocuments() {
            if (this.files.length === 0) {
                alert("Please select at least one document.");
                return;
            }

            this.uploading = true;

            for (const item of this.files) {
                await this.uploadSingleFile(item);
                this.updateTotalProgress();
            }

            this.uploading = false;
        },

        async uploadSingleFile(item) {
            const file = item.file;
            const totalChunks = Math.ceil(file.size / this.chunkSize);

            console.log(`Uploading ${file.name} in ${totalChunks} chunks...`);

            for (let chunkIndex = 0; chunkIndex < totalChunks; chunkIndex++) {
                const start = chunkIndex * this.chunkSize;
                const end = Math.min(start + this.chunkSize, file.size);
                const chunk = file.slice(start, end);
            }
        },

        updateTotalProgress() {
            if (this.files.length === 0) {
                this.totalProgress = 0;
                return;
            }

            const total = this.files.reduce((sum, item) => sum + item.progress, 0,);
            this.totalProgress = Math.round(total / this.files.length);
        },

        reset() {
            this.files = [];
            this.uploading = false;
            this.totalProgress = 0;
        },
    };
};
