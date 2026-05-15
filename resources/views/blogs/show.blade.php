@extends('layouts.app')

@section('title', $blog->title . ' – BlogYaari')
@section('meta_description', $blog->short_description)

@push('styles')
<style>
    .blog-detail-hero {
        background: var(--ink);
        color: white;
        padding: 40px 0 32px;
        margin-bottom: 32px;
    }

    .blog-detail-img {
        border-radius: 12px;
        max-height: 420px;
        width: 100%;
        object-fit: cover;
        box-shadow: 0 8px 40px rgba(0,0,0,0.2);
    }

    .blog-detail-img-placeholder {
        border-radius: 12px;
        height: 280px;
        background: linear-gradient(135deg, #2d2d4e, var(--brand));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    .blog-content-body {
        background: white;
        border-radius: 12px;
        padding: 36px;
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
    }

    /* Rich text content styles */
    .blog-content-body h1,
    .blog-content-body h2,
    .blog-content-body h3,
    .blog-content-body h4 {
        font-family: var(--font-display);
        color: var(--ink);
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .blog-content-body p { margin-bottom: 1rem; }

    .blog-content-body table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
        font-size: 0.9rem;
    }

    .blog-content-body table th,
    .blog-content-body table td {
        border: 1px solid var(--border);
        padding: 10px 14px;
        text-align: left;
    }

    .blog-content-body table th {
        background: var(--surface);
        font-family: var(--font-display);
        font-size: 0.85rem;
    }

    .blog-content-body table tr:hover { background: #fafaf8; }

    .blog-content-body ul, .blog-content-body ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .blog-content-body li { margin-bottom: 6px; }

    .blog-content-body img {
        max-width: 100%;
        border-radius: 8px;
        margin: 1rem 0;
    }

    .blog-content-body blockquote {
        border-left: 4px solid var(--brand);
        padding: 12px 20px;
        background: var(--tag-bg);
        border-radius: 0 8px 8px 0;
        margin: 1.5rem 0;
        font-style: italic;
    }

    .blog-content-body a { color: var(--brand); }

    /* Related posts */
    .related-card {
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 16px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        text-decoration: none;
        color: inherit;
        transition: box-shadow 0.2s, transform 0.2s;
    }

    .related-card:hover {
        box-shadow: var(--shadow-hover);
        transform: translateY(-2px);
        color: inherit;
    }

    .related-card-icon {
        width: 44px;
        height: 44px;
        background: var(--tag-bg);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .share-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1.5px solid var(--border);
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        color: var(--ink-soft);
        text-decoration: none;
    }

    .share-btn:hover {
        background: var(--brand);
        border-color: var(--brand);
        color: white;
    }

    @media (max-width: 768px) {
        .blog-content-body { padding: 20px; }
        .blog-detail-hero { padding: 24px 0 20px; }
    }
</style>
@endpush

@section('content')

<!-- Blog Hero -->
<div class="blog-detail-hero">
    <div class="container">
        <!-- Breadcrumb -->
        <nav style="font-size:0.8rem;margin-bottom:16px;">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;">Home</a>
            <span style="color:rgba(255,255,255,0.3);margin:0 8px;">/</span>
            <span style="color:rgba(255,255,255,0.5);">{{ $blog->category }}</span>
            <span style="color:rgba(255,255,255,0.3);margin:0 8px;">/</span>
            <span style="color:rgba(255,255,255,0.8);">{{ Str::limit($blog->title, 40) }}</span>
        </nav>

        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <span class="blog-category-tag mb-3 d-inline-block">{{ $blog->category }}</span>
                <h1 style="font-family:var(--font-display);font-weight:800;font-size:clamp(1.3rem,3vw,1.9rem);line-height:1.3;margin-bottom:16px;">
                    {{ $blog->title }}
                </h1>
                <p style="color:rgba(255,255,255,0.65);font-size:0.9rem;margin-bottom:20px;">
                    {{ $blog->short_description }}
                </p>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <span style="color:rgba(255,255,255,0.5);font-size:0.82rem;">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $blog->created_at->format('d M Y, h:i A') }}
                    </span>
                    <div class="d-flex gap-2">
                        <a href="#" class="share-btn" title="Copy link" onclick="navigator.clipboard.writeText(window.location.href);return false;">
                            <i class="bi bi-link-45deg" style="font-size:0.9rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if($blog->image_path)
                    <img src="{{ asset('storage/' . $blog->image_path) }}"
                         alt="{{ $blog->title }}"
                         class="blog-detail-img">
                @else
                    <div class="blog-detail-img-placeholder">
                        📋
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Blog Content -->
<div class="container">
    <div class="row g-4">

        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="blog-content-body">
                {!! $blog->content !!}
            </div>

            <!-- Tags/Back -->
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back to Blogs
                </a>
                <span style="font-size:0.82rem;color:var(--ink-soft)">
                    Published: {{ $blog->created_at->format('d M Y') }}
                </span>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">

            <!-- Related Posts -->
            @if($related->count())
            <div style="background:white;border-radius:12px;padding:20px;border:1px solid var(--border);margin-bottom:20px;">
                <h3 style="font-family:var(--font-display);font-size:1rem;font-weight:700;margin-bottom:16px;">
                    Related Posts
                </h3>
                <div class="d-flex flex-column gap-3">
                    @foreach($related as $rel)
                    <a href="{{ route('blog.show', $rel->slug) }}" class="related-card">
                        <div class="related-card-icon">📌</div>
                        <div>
                            <div style="font-family:var(--font-display);font-weight:600;font-size:0.85rem;line-height:1.4;margin-bottom:4px;">
                                {{ Str::limit($rel->title, 55) }}
                            </div>
                            <div style="font-size:0.75rem;color:var(--ink-soft);">
                                {{ $rel->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Category Box -->
            <div style="background:white;border-radius:12px;padding:20px;border:1px solid var(--border);">
                <h3 style="font-family:var(--font-display);font-size:1rem;font-weight:700;margin-bottom:16px;">
                    Browse Categories
                </h3>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(\App\Models\Blog::getCategories() as $cat)
                    <a href="{{ route('home') }}"
                       onclick="event.preventDefault(); window.location='{{ route('home') }}?category={{ urlencode($cat) }}';"
                       style="display:inline-block;padding:6px 12px;background:var(--tag-bg);color:var(--tag-color);
                              border-radius:20px;font-size:0.78rem;font-weight:600;text-decoration:none;
                              transition:all 0.2s;"
                       onmouseover="this.style.background='var(--brand)';this.style.color='white'"
                       onmouseout="this.style.background='var(--tag-bg)';this.style.color='var(--tag-color)'">
                        {{ $cat }}
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
