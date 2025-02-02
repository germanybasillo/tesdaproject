document.getElementById('logo-upload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('logo-preview');
            const text = document.getElementById('logo-text');
            preview.src = e.target.result;
            preview.style.display = "block";
            text.style.display = "none"; // Hide text after upload
        };
        reader.readAsDataURL(file);
    }
});