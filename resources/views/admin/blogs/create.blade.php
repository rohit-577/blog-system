@extends('admin.layouts.app')
@section('title', 'Create Blog')
@section('page-title', 'Create New Blog')

@push('styles')
<style>
    .image-preview {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 12px;
        display: none;
    }
    .upload-zone {
        border: 2px dashed #e2e4e8;
        border-radius: 8px;
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
    }
    .upload-zone:hover {
        border-color: #e63329;
        background: #fff0ef;
    }
    .char-count {
        font-size: 0.72rem;
        color: #4a4a6a;
        text-align: right;
        margin-top: 4px;
    }
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
        </div>

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blog-form">
            @csrf

            <div class="row g-3">

                <!-- Left Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <div class="admin-card mb-3">
                        <div style="padding:20px;">
                            <label class="form-label-admin">Blog Title *</label>
                            <input type="text" name="title" id="title"
                                   class="form-control-admin w-100"
                                   value="{{ old('title') }}"
                                   placeholder="Enter a descriptive title..."
                                   maxlength="255" required>
                            @error('title')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                            <div class="char-count"><span id="title-count">0</span>/255</div>
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div class="admin-card mb-3">
                        <div style="padding:20px;">
                            <label class="form-label-admin">Short Description *</label>
                            <textarea name="short_description" id="short_desc"
                                      class="form-control-admin w-100"
                                      rows="3"
                                      placeholder="Brief summary shown on listing page..."
                                      maxlength="500"
                                      required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                            <div class="char-count"><span id="desc-count">0</span>/500</div>
                        </div>
                    </div>

                    <!-- Content Editor -->
                    <div class="admin-card mb-3">
                        <div class="admin-card-header">
                            <h3 class="admin-card-title">Content *</h3>
                            <span style="font-size:0.72rem;color:#4a4a6a;">Supports tables, images, formatting</span>
                        </div>
                        <div style="padding:16px;">
                            <textarea name="content" id="content">{{ old('content') }}</textarea>
                            @error('content')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">

                    <!-- Publish Box -->
                    <div class="admin-card mb-3">
                        <div class="admin-card-header">
                            <h3 class="admin-card-title">Publish</h3>
                        </div>
                        <div style="padding:16px;">
                            <div style="display:flex;align-items:center;gap:8px;padding:12px;
                                        background:#f0fdf4;border-radius:8px;margin-bottom:16px;">
                                <i class="bi bi-calendar-check" style="color:#166534;"></i>
                                <div>
                                    <div style="font-size:0.75rem;font-weight:600;color:#166534;">Auto Date</div>
                                    <div style="font-size:0.72rem;color:#4a4a6a;">{{ now()->format('d M Y, h:i A') }}</div>
                                </div>
                            </div>
                            <button type="submit" class="btn-admin-primary w-100">
                                <i class="bi bi-cloud-upload me-2"></i>Publish Blog
                            </button>
                            <a href="{{ route('admin.blogs.index') }}"
                               style="display:block;text-align:center;margin-top:10px;font-size:0.82rem;
                                      color:#4a4a6a;text-decoration:none;">
                                Cancel
                            </a>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="admin-card mb-3">
                        <div style="padding:16px;">
                            <label class="form-label-admin">Category *</label>
                            <select name="category" class="form-control-admin w-100" required>
                                <option value="">Select category...</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="admin-card">
                        <div style="padding:16px;">
                            <label class="form-label-admin">Featured Image</label>
                            <div class="upload-zone" onclick="document.getElementById('image-input').click()">
                                <i class="bi bi-image" style="font-size:1.8rem;color:#4a4a6a;display:block;margin-bottom:8px;"></i>
                                <div style="font-size:0.82rem;font-weight:500;color:#4a4a6a;">Click to upload image</div>
                                <div style="font-size:0.72rem;color:#9ca3af;margin-top:4px;">JPG, PNG, WEBP — Max 2MB</div>
                            </div>
                            <input type="file" id="image-input" name="image"
                                   accept="image/*" style="display:none;"
                                   onchange="previewImage(this)">
                            <img id="image-preview" class="image-preview" alt="Preview">
                            @error('image')
                                <div style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    let editorInstance;

    // Initialize CKEditor
    ClassicEditor.create(document.querySelector('#content'), {

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
                {
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4'
                }
            ]
        },

        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells',
                'tableCellProperties',
                'tableProperties'
            ]
        },

        image: {
            toolbar: [
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                '|',
                'toggleImageCaption',
                'imageTextAlternative'
            ]
        },

        licenseKey: ''

    })

    .then(editor => {

        window.editor = editor;

        editorInstance = editor;

        // Sync editor content on every change
        editor.model.document.on('change:data', () => {
            document.getElementById('content').value =
    window.editor.getData();
        });

    })

    .catch(error => {
        console.error('CKEditor Error:', error);
    });

    // FORCE sync before form submit
    document.getElementById('blog-form').addEventListener('submit', function () {

        if (editorInstance) {
            document.getElementById('content').value =
    window.editor.getData();
        }

    });

    // Character counters
    const titleInput = document.getElementById('title');
    const descInput = document.getElementById('short_desc');

    // Initial count
    document.getElementById('title-count').textContent =
        titleInput.value.length;

    document.getElementById('desc-count').textContent =
        descInput.value.length;

    // Live count
    titleInput.addEventListener('input', function () {
        document.getElementById('title-count').textContent =
            this.value.length;
    });

    descInput.addEventListener('input', function () {
        document.getElementById('desc-count').textContent =
            this.value.length;
    });

    // Image Preview
    function previewImage(input) {

        if (input.files && input.files[0]) {

            const reader = new FileReader();

            reader.onload = function (e) {

                const preview =
                    document.getElementById('image-preview');

                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endpush
