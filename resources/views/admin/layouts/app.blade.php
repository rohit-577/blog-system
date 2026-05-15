<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') – BlogYaari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root{
--brand:#ef4444;
--brand-dark:#dc2626;
--surface:#f6f8fb;
--surface-2:#ffffff;
--text:#111827;
--muted:#6b7280;
--border:#e5e7eb;
--sidebar:#111827;
--sidebar-hover:#1f2937;
--radius:18px;
--shadow:0 10px 30px rgba(0,0,0,.05);
--font:'Inter',sans-serif;
--sidebar-w:250px;
}

*{
box-sizing:border-box;
}

body{
margin:0;
font-family:var(--font);
background:var(--surface);
color:var(--text);
min-height:100vh;
}

.admin-sidebar{
width:var(--sidebar-w);
background:var(--sidebar);
position:fixed;
top:0;
left:0;
height:100vh;
display:flex;
flex-direction:column;
z-index:1000;
border-right:1px solid rgba(255,255,255,.05);
}

.sidebar-brand{
padding:24px 22px;
font-size:1.45rem;
font-weight:800;
color:#fff;
display:flex;
align-items:center;
gap:10px;
border-bottom:1px solid rgba(255,255,255,.06);
}

.sidebar-brand-dot{
width:10px;
height:10px;
background:var(--brand);
border-radius:50%;
}

.sidebar-badge{
background:rgba(239,68,68,.15);
color:#fff;
font-size:.65rem;
padding:4px 8px;
border-radius:999px;
margin-left:auto;
}

.sidebar-nav{
flex:1;
padding:18px 12px;
}

.sidebar-section-label{
color:rgba(255,255,255,.35);
font-size:.68rem;
font-weight:700;
text-transform:uppercase;
margin:18px 12px 10px;
letter-spacing:.08em;
}

.sidebar-link{
display:flex;
align-items:center;
gap:12px;
padding:13px 16px;
margin-bottom:6px;
border-radius:14px;
text-decoration:none;
color:rgba(255,255,255,.75);
font-size:.92rem;
font-weight:600;
transition:.2s;
}

.sidebar-link:hover{
background:var(--sidebar-hover);
color:#fff;
}

.sidebar-link.active{
background:var(--brand);
color:#fff;
}

.sidebar-footer{
padding:18px;
border-top:1px solid rgba(255,255,255,.06);
}

.admin-main{
margin-left:var(--sidebar-w);
min-height:100vh;
display:flex;
flex-direction:column;
}

.admin-topbar{
height:74px;
background:#fff;
border-bottom:1px solid var(--border);
display:flex;
align-items:center;
justify-content:space-between;
padding:0 28px;
position:sticky;
top:0;
z-index:500;
box-shadow:0 2px 10px rgba(0,0,0,.03);
}

.topbar-title{
font-size:1.1rem;
font-weight:800;
}

.topbar-user{
display:flex;
align-items:center;
gap:12px;
}

.user-avatar{
width:42px;
height:42px;
border-radius:50%;
background:var(--brand);
color:#fff;
display:flex;
align-items:center;
justify-content:center;
font-weight:700;
}

.admin-content{
padding:30px;
}

.admin-card,
.stat-card{
background:#fff;
border-radius:var(--radius);
border:1px solid var(--border);
box-shadow:var(--shadow);
}

.admin-card{
overflow:hidden;
}

.admin-card-header{
padding:22px 24px;
border-bottom:1px solid var(--border);
}

.admin-card-title{
margin:0;
font-size:1rem;
font-weight:700;
}

.stat-card{
padding:24px;
}

.stat-number{
font-size:2.4rem;
font-weight:800;
line-height:1;
}

.stat-label{
color:var(--muted);
margin-top:8px;
}

.form-control-admin,
input,
textarea,
select{
border:1.5px solid var(--border)!important;
border-radius:14px!important;
padding:14px 16px!important;
min-height:54px;
background:#fff!important;
}

textarea{
min-height:180px;
}

.form-control-admin:focus,
input:focus,
textarea:focus,
select:focus{
border-color:var(--brand)!important;
box-shadow:0 0 0 4px rgba(239,68,68,.08)!important;
outline:none!important;
}

.btn-admin-primary,
button[type="submit"]{
background:var(--brand);
border:none;
color:#fff;
padding:14px 24px;
border-radius:14px;
font-weight:700;
transition:.2s;
}

.btn-admin-primary:hover,
button[type="submit"]:hover{
background:var(--brand-dark);
}

.admin-table{
width:100%;
border-collapse:collapse;
}

.admin-table th{
background:#f9fafb;
color:#6b7280;
font-size:.75rem;
padding:16px;
}

.admin-table td{
padding:18px 16px;
border-bottom:1px solid var(--border);
}

.admin-alert{
border-radius:16px;
padding:16px 18px;
font-weight:600;
}

.admin-alert-success{
background:#ecfdf5;
color:#065f46;
}

.admin-alert-error{
background:#fef2f2;
color:#991b1b;
}

.mobile-toggle{
display:none;
}

@media(max-width:768px){

.admin-sidebar{
transform:translateX(-100%);
transition:.3s;
}

.admin-sidebar.open{
transform:translateX(0);
}

.admin-main{
margin-left:0;
}

.admin-content{
padding:18px;
}

.mobile-toggle{
display:flex;
position:fixed;
top:14px;
left:14px;
width:46px;
height:46px;
border:none;
border-radius:12px;
background:#111827;
color:#fff;
z-index:1200;
align-items:center;
justify-content:center;
}

}

    </style>

    @stack('styles')
</head>
<body>

<button class="mobile-toggle" onclick="document.querySelector('.admin-sidebar').classList.toggle('open')">
    <i class="bi bi-list"></i>
</button>

<!-- Sidebar -->
<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <span class="sidebar-brand-dot"></span>
        BlogYaari
        <span class="sidebar-badge">ADMIN</span>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Main</div>
        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <div class="sidebar-section-label">Content</div>
        <a href="{{ route('admin.blogs.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
            <i class="bi bi-file-text"></i> All Blogs
        </a>
        <a href="{{ route('admin.blogs.create') }}"
           class="sidebar-link {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}">
            <i class="bi bi-plus-square"></i> New Blog
        </a>

        <div class="sidebar-section-label">Site</div>
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
            <i class="bi bi-box-arrow-up-right"></i> View Site
        </a>
    </nav>

    <div class="sidebar-footer">
        <div style="font-size:0.78rem;color:rgba(255,255,255,0.4);margin-bottom:10px;">
            Logged in as <strong style="color:rgba(255,255,255,0.7)">{{ auth()->user()->name ?? 'Admin' }}</strong>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:rgba(230,51,41,0.15);border:1px solid rgba(230,51,41,0.3);
                    color:var(--brand);width:100%;padding:8px;border-radius:6px;font-size:0.82rem;
                    cursor:pointer;font-family:var(--font-body);">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>
</aside>

<!-- Main -->
<div class="admin-main">

    <!-- Top Bar -->
    <div class="admin-topbar">
        <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
        <div class="topbar-user">
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <span style="font-size:0.85rem;color:var(--ink-soft);">{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </div>

    <!-- Content -->
    <div class="admin-content">

        @if(session('success'))
        <div class="admin-alert admin-alert-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="admin-alert admin-alert-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
</script>

@stack('scripts')
</body>
</html>
