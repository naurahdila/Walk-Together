@extends('admin.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5">
    <h2>Create Article</h2>
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="summernote" name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        {{-- <div class="mb-3">
            <label for="youtube_url" class="form-label">YouTube URL</label>
            <input type="url" name="youtube_url" class="form-control" id="youtube_url" placeholder="https://www.youtube.com/watch?v=example" />
        </div> --}}
        <div class="form-group form-check">
            <input type="checkbox" name="is_published" class="form-check-input" id="is_published">
            <label class="form-check-label" for="is_published">Publish</label>
        </div>
        <button type="submit" class="btn btn-primary">Save Article</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Summernote
        $('#summernote').summernote({
            height: 300,
            callbacks: {
                onImageUpload: function (files) {
                    uploadImage(files[0]); // Upload image ke server
                }
            }
        });

        // Fungsi untuk meng-upload gambar
        function uploadImage(file) {
            let data = new FormData();
            data.append("file", file);
            data.append("_token", $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('image.upload') }}", // Route untuk upload gambar
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (url) {
                    $('#summernote').summernote('insertImage', url); // Menambahkan gambar ke editor
                },
                error: function (data) {
                    console.error("Upload error:", data.responseText);
                }
            });
        }
    });
</script>
</body>
</html>
@endsection