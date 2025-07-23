@extends('layout.masterlayout')
@section('content')
    <div class="container">
        <h1>Create New Post</h1>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        value="{{ old('slug') }}" required>
                    <button class="btn btn-outline-secondary" type="button" id="generate-slug-button">
                        Generate Slug
                    </button>
                </div>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6"
                    required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Summary -->
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary"
                    rows="3">{{ old('summary') }}</textarea>
                <button class="pull-left btn btn-outline-secondary" type="button" id="generate-summary-button">
                    Generate Summary
                </button>
                @error('summary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Published Date -->
            <div class="mb-3">
                <label for="published_at" class="form-label">Published Date</label>
                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                    id="published_at" name="published_at" value="{{ old('published_at') }}">
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Author -->
            <div class="mb-3">
                <label for="author" class="form-label">Author ID</label>
                <input type="number" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                    value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save Post</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#generate-slug-button').click(function () {
            const title = $('#title').val();

            if (!title) {
                alert('Please enter a title first.');
                return;
            }

            $.ajax({
                url: '{{ route("generate.slug") }}',
                type: 'POST',
                data: {
                    title: title,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#slug').val(response.slug);
                },
                error: function (xhr) {
                    alert('Error generating slug.');
                }
            });
        });
        $('#generate-summary-button').click(function () {
            const title = $('#title').val();

            if (!title) {
                alert('Please enter a title first.');
                return;
            }

            $.ajax({
                url: '{{ route("generate.summary") }}',
                type: 'POST',
                data: {
                    title: title,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#summary').val(response.summary);
                },
                error: function (xhr) {
                    alert('Error generating summary.');
                }
            });
        });
    </script>
@endpush