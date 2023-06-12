
@push('script')
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('keyup', function() {
            fetch('/admin/categories/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endpush
