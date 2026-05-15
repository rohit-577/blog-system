@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<!-- Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon" style="background:#fff0ef;color:#e63329;">
                    <i class="bi bi-file-text"></i>
                </div>
            </div>
            <div class="stat-number">{{ $total }}</div>
            <div class="stat-label">Total Blogs</div>
        </div>
    </div>
    @foreach($byCategory as $cat)
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon" style="background:#f0f4ff;color:#3b5bdb;">
                    <i class="bi bi-tag"></i>
                </div>
            </div>
            <div class="stat-number">{{ $cat->count }}</div>
            <div class="stat-label">{{ $cat->category }}</div>
        </div>
    </div>
    @endforeach
</div>

<!-- Quick Actions + Recent Posts -->
<div class="row g-3">

    <!-- Quick Actions -->
    <div class="col-md-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Quick Actions</h3>
            </div>
            <div style="padding:16px;display:flex;flex-direction:column;gap:10px;">
                <a href="{{ route('admin.blogs.create') }}"
                   style="display:flex;align-items:center;gap:12px;padding:14px 16px;
                          background:#fff0ef;border-radius:8px;text-decoration:none;
                          color:#e63329;font-weight:600;font-size:0.875rem;transition:background 0.2s;"
                   onmouseover="this.style.background='#ffdede'"
                   onmouseout="this.style.background='#fff0ef'">
                    <i class="bi bi-plus-circle-fill" style="font-size:1.1rem;"></i>
                    Create New Blog
                </a>
                <a href="{{ route('admin.blogs.index') }}"
                   style="display:flex;align-items:center;gap:12px;padding:14px 16px;
                          background:#f0f4ff;border-radius:8px;text-decoration:none;
                          color:#3b5bdb;font-weight:600;font-size:0.875rem;transition:background 0.2s;"
                   onmouseover="this.style.background='#dde4ff'"
                   onmouseout="this.style.background='#f0f4ff'">
                    <i class="bi bi-list-ul" style="font-size:1.1rem;"></i>
                    Manage All Blogs
                </a>
                <a href="{{ route('home') }}" target="_blank"
                   style="display:flex;align-items:center;gap:12px;padding:14px 16px;
                          background:#f0fdf4;border-radius:8px;text-decoration:none;
                          color:#166534;font-weight:600;font-size:0.875rem;transition:background 0.2s;"
                   onmouseover="this.style.background='#dcfce7'"
                   onmouseout="this.style.background='#f0fdf4'">
                    <i class="bi bi-box-arrow-up-right" style="font-size:1.1rem;"></i>
                    View Live Site
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="col-md-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Recent Blogs</h3>
                <a href="{{ route('admin.blogs.index') }}"
                   style="font-size:0.78rem;color:#e63329;text-decoration:none;">View all</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent as $blog)
                        <tr>
                            <td>
                                <div style="font-weight:500;max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                    {{ $blog->title }}
                                </div>
                            </td>
                            <td>
                                <span style="background:#fff0ef;color:#e63329;padding:3px 8px;
                                             border-radius:20px;font-size:0.72rem;font-weight:600;">
                                    {{ $blog->category }}
                                </span>
                            </td>
                            <td style="color:#4a4a6a;font-size:0.8rem;">
                                {{ $blog->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                                       style="color:#3b5bdb;font-size:0.85rem;" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                                       style="color:#166534;font-size:0.85rem;" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
