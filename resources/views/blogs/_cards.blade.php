@forelse($blogs as $blog)
<div class="col-md-6 col-lg-4 fade-in" style="animation-delay: {{ $loop->index * 0.05 }}s">
    <div class="blog-card">
        @if($blog->image_path)
            <img src="{{ asset('storage/' . $blog->image_path) }}"
                 alt="{{ $blog->title }}"
                 class="blog-card-img"
                 loading="lazy">
        @else
            <div class="blog-card-img-placeholder">
                @php
                    $icons = ['📋','📝','📅','🎯','📊','🏆','📌','🔔'];
                    echo $icons[$blog->id % count($icons)];
                @endphp
            </div>
        @endif

        <div class="blog-card-body">
            <span class="blog-category-tag">{{ $blog->category }}</span>
            <h2 class="blog-card-title">{{ $blog->title }}</h2>
            <p class="blog-card-desc">{{ $blog->short_description }}</p>
            <div class="blog-card-footer">
                <span class="blog-date">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $blog->created_at->format('d M Y') }}
                </span>
                <a href="{{ route('blog.show', $blog->slug) }}" class="btn-read-more">
                    Read More <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@empty
<div class="col-12">
    <div class="empty-state">
        <div class="empty-state-icon">🔍</div>
        <h5 style="font-family:var(--font-display); color:var(--ink-soft)">No blogs found</h5>
        <p class="text-muted" style="font-size:0.9rem">Try adjusting your search or filters</p>
    </div>
</div>
@endforelse

@if(method_exists($blogs, 'links') && $blogs->hasPages())
<div class="col-12 mt-4 d-flex justify-content-center">
    {{ $blogs->links('pagination::bootstrap-5') }}
</div>
@endif
