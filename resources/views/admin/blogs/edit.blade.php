@extends('admin.layouts.app')
@section('title', 'Edit Blog')
@section('page-title', 'Edit Blog')

@push('styles')
<style>
    .image-preview { width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; margin-top: 12px; }
    .upload-zone {
        border: 2px dashed #e2e4e8; border-radius: 8px; padding: 24px;
        text-align: center; cursor: pointer; transition: border-color 0.2s, background 0.2s;
    }
    .upload-zone:hover { border-color: #e63329; background: #fff0ef; }
    .char-count { font-size: 0.72rem; color: #4a4a6a; text-align: right; margin-top: 4px; }
    .ck-editor__editable { min-height: 320px !important; }
</style>
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">

        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('admin.blogs.index') }}"
               style="color:#4a4a6a;text-decoration:none;font-size:0.875rem;">
                <i class="bi bi-arrow-left me-1"></i> Back to Blogs
            </a>
            <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
               style="color:#166534;text-decoration:none;font-size:0.875rem;">
                <i class="bi bi-eye me-1"></i> View on Site
            </a>
        </div>

        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-lg-8">

                    <div class="admin-card mb-3">
                        <div style="padding:20px;">
                            <label class="form-label-admin">Blog Title *</label>
                            <input type="text" name="title" id="title"
                                   class="form-control-admin w-100"
                                   value="{{ old('title', $blog->title) }}"
                                   maxlength="255" required>
                            @error('title')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                            <div class="char-count"><span id="title-count">{{ strlen($blog->title) }}</span>/255</div>
                        </div>
                    </div>

                    <div class="admin-card mb-3">
                        <div style="padding:20px;">
                            <label class="form-label-admin">Short Description *</label>
                            <textarea name="short_description" id="short_desc"
                                      class="form-control-admin w-100"
                                      rows="3" maxlength="500"
                                      required>{{ old('short_description', $blog->short_description) }}</textarea>
                            @error('short_description')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                            <div class="char-count"><span id="desc-count">{{ strlen($blog->short_description) }}</span>/500</div>
                        </div>
                    </div>

                    <div class="admin-card mb-3">
                        <div class="admin-card-header">
                            <h3 class="admin-card-title">Content *</h3>
                        </div>
                        <div style="padding:16px;">
                            <textarea name="content" id="content">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="admin-card mb-3">
                        <div class="admin-card-header"><h3 class="admin-card-title">Update</h3></div>
                        <div style="padding:16px;">
                            <div style="font-size:0.75rem;color:#4a4a6a;margin-bottom:12px;">
                                <i class="bi bi-calendar3 me-1"></i>
                                Created: {{ $blog->created_at->format('d M Y') }}
                            </div>
                            <button type="submit" class="btn-admin-primary w-100">
                                <i class="bi bi-check-lg me-2"></i>Update Blog
                            </button>
                            <a href="{{ route('admin.blogs.index') }}"
                               style="display:block;text-align:center;margin-top:10px;font-size:0.82rem;color:#4a4a6a;text-decoration:none;">
                                Cancel
                            </a>
                        </div>
                    </div>

                    <div class="admin-card mb-3">
                        <div style="padding:16px;">
                            <label class="form-label-admin">Category *</label>
                            <select name="category" class="form-control-admin w-100" required>
                                @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category', $blog->category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="admin-card">
                        <div style="padding:16px;">
                            <label class="form-label-admin">Featured Image</label>
                            @if($blog->image_path)
                                <img src="{{ asset('storage/' . $blog->image_path) }}"
                                     id="image-preview" class="image-preview" alt="Current image">
                            @else
                                <img id="image-preview" class="image-preview" style="display:none;" alt="Preview">
                            @endif
                            <div class="upload-zone mt-2" onclick="document.getElementById('image-input').click()">
                                <i class="bi bi-arrow-repeat" style="font-size:1.2rem;color:#4a4a6a;display:block;margin-bottom:4px;"></i>
                                <div style="font-size:0.8rem;color:#4a4a6a;">Click to replace image</div>
                            </div>
                            <input type="file" id="image-input" name="image"
                                   accept="image/*" style="display:none;"
                                   onchange="previewImage(this)">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor.create(document.querySelector('#content'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                'alignment', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'link', 'blockQuote', 'insertTable', '|',
                'imageUpload', 'mediaEmbed', '|',
                'undo', 'redo'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4' },
            ]
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties', 'tableProperties']
        },
        licenseKey: '',
    }).catch(err => console.error(err));

    const titleInput = document.getElementById('title');
    const descInput = document.getElementById('short_desc');

    titleInput.addEventListener('input', () => document.getElementById('title-count').textContent = titleInput.value.length);
    descInput.addEventListener('input', () => document.getElementById('desc-count').textContent = descInput.value.length);

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
