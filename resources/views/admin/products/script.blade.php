@push('style')
@endpush

@push('script')
    <!-- ckeditor -->
    <script src="{{asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('keyup', function() {
            fetch('/admin/products/checkSlug?nama=' + nama.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        ClassicEditor
            .create(document.querySelector('.classic-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
