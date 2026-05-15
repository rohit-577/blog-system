@extends('admin.layouts.app')
@section('title', 'All Blogs')
@section('page-title', 'All Blogs')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">All Blogs ({{ $blogs->total() }})</h3>
        <a href="{{ route('admin.blogs.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-lg me-1"></i> New Blog
        </a>
    </div>

    <div style="overflow-x:auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr>
                    <td style="color:#4a4a6a;font-size:0.8rem;">{{ $blog->id }}</td>
                    <td>
                        @if($blog->image_path)
                            <img src="{{ asset('storage/' . $blog->image_path) }}"
                                 style="width:48px;height:40px;object-fit:cover;border-radius:6px;">
                        @else
                            <div style="width:48px;height:40px;background:linear-gradient(135deg,#1a1a2e,#e63329);
                                        border-radius:6px;display:flex;align-items:center;justify-content:center;
                                        font-size:1.2rem;">📋</div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:0.875rem;max-width:260px;">
                            {{ Str::limit($blog->title, 55) }}
                        </div>
                        <div style="font-size:0.75rem;color:#4a4a6a;margin-top:2px;">
                            /blog/{{ Str::limit($blog->slug, 30) }}
                        </div>
                    </td>
                    <td>
                        <span style="background:#fff0ef;color:#e63329;padding:3px 10px;
                                     border-radius:20px;font-size:0.72rem;font-weight:600;white-space:nowrap;">
                            {{ $blog->category }}
                        </span>
                    </td>
                    <td style="color:#4a4a6a;font-size:0.82rem;white-space:nowrap;">
                        {{ $blog->created_at->format('d M Y') }}
                    </td>
                    <td>
                        <div class="d-flex gap-3 align-items-center">
                            <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                               style="color:#166534;" title="View on site">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                               style="color:#3b5bdb;" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button onclick="confirmDelete({{ $blog->id }}, '{{ addslashes($blog->title) }}')"
                                    style="background:none;border:none;color:#dc2626;cursor:pointer;padding:0;" title="Delete">
                                <i class="bi bi-trash3"></i>
                            </button>
                            <form id="delete-form-{{ $blog->id }}"
                                  action="{{ route('admin.blogs.destroy', $blog) }}"
                                  method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:40px;color:#4a4a6a;">
                        No blogs yet.
                        <a href="{{ route('admin.blogs.create') }}" style="color:#e63329;">Create your first one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
    <div style="padding:16px;border-top:1px solid var(--border);">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
function confirmDelete(id, title) {
    if (confirm('Delete "' + title + '"?\n\nThis cannot be undone.')) {
        const form = document.getElementById('delete-form-' + id);
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Remove the row with a fade
                const row = form.closest('tr');
                row.style.transition = 'opacity 0.3s';
                row.style.opacity = '0';
                setTimeout(() => row.remove(), 300);
            }
        })
        .catch(() => form.submit());
    }
}
</script>
@endpush
