const options = {
    placeholder: 'Masukkan teks disini...',
    modules: {
      toolbar: true
    },
    theme: 'snow'
};

var editor = new Quill('#quill-editor', options);

function initQuillEditorActivity() {
    if (document.getElementById("quill-editor-area")) {
        var quillEditor = document.getElementById("quill-editor-area");

        // Set konten editor dengan nilai dari textarea
        editor.root.innerHTML = quillEditor.value;

        // Update textarea saat konten di Quill editor berubah
        editor.on("text-change", function () {
            quillEditor.value = editor.root.innerHTML;
        });

        // Update Quill editor saat textarea diubah
        quillEditor.addEventListener("input", function () {
            editor.root.innerHTML = quillEditor.value;
        });
    }
}

function resetQuillEditor() {
    editor.setText("");
}
