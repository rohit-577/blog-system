<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BlogYaari – Exam & Career Updates')</title>
    <meta name="description" content="@yield('meta_description', 'Latest exam updates, admit cards, answer keys and results.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root{
    --brand:#ff4d4f;
    --brand-dark:#e63b3d;

    --bg:#f5f7fb;
    --white:#ffffff;

    --text:#111827;
    --muted:#6b7280;
    --border:#e5e7eb;

    --shadow-sm:0 2px 8px rgba(0,0,0,.04);
    --shadow-md:0 10px 30px rgba(0,0,0,.06);
    --shadow-lg:0 20px 50px rgba(0,0,0,.10);

    --radius:22px;

    --font:'DM Sans',sans-serif;
    --display:'Syne',sans-serif;
}

*{
    box-sizing:border-box;
}

body{
    margin:0;
    background:var(--bg);
    color:var(--text);
    font-family:var(--font);
    overflow-x:hidden;
    -webkit-font-smoothing:antialiased;
}

.container{
    max-width:1180px;
}

/* =========================
   NAVBAR
========================= */

.navbar-main{
    position:sticky;
    top:0;
    z-index:999;
    background:rgba(255,255,255,.9);
    backdrop-filter:blur(12px);
    border-bottom:1px solid var(--border);
}

.navbar-brand-custom{
    display:flex;
    align-items:center;
    gap:12px;
    padding:22px 0;
    text-decoration:none;
    color:var(--text)!important;

    font-size:2rem;
    font-family:var(--display);
    font-weight:800;
    letter-spacing:-0.05em;
}

.brand-dot{
    width:14px;
    height:14px;
    border-radius:50%;
    background:linear-gradient(135deg,#ff7b7b,var(--brand));
    box-shadow:0 0 16px rgba(255,77,79,.4);
}

.nav-link-custom{
    color:#4b5563!important;
    text-decoration:none;
    font-weight:700;
    padding:10px 14px;
    border-radius:12px;
    transition:.25s ease;
}

.nav-link-custom:hover{
    background:#fff;
    color:var(--brand)!important;
}

/* =========================
   SEARCH
========================= */

.search-bar-wrapper{
    padding:36px 0 18px;
}

.search-input-group{
    position:relative;
    max-width:850px;
    margin:auto;
}

.search-input-group input{
    width:100%;
    height:72px;

    border:none;
    outline:none;

    background:#fff;

    border-radius:24px;

    padding:0 70px 0 28px;

    font-size:1rem;

    box-shadow:var(--shadow-md);

    transition:.3s ease;
}

.search-input-group input:focus{
    transform:translateY(-2px);
    box-shadow:
        0 12px 35px rgba(255,77,79,.12),
        0 0 0 4px rgba(255,77,79,.08);
}

.search-icon{
    position:absolute;
    right:26px;
    top:50%;
    transform:translateY(-50%);
    color:#9ca3af;
    font-size:1.1rem;
}

/* =========================
   CATEGORY PILLS
========================= */

.category-strip{
    padding-bottom:20px;
}

.category-strip-inner{
    display:flex;
    gap:14px;
    overflow:auto;
    padding:8px 0;
}

.category-strip-inner::-webkit-scrollbar{
    display:none;
}

.cat-pill{
    border:none;

    background:#fff;

    color:#4b5563;

    border-radius:999px;

    padding:13px 22px;

    font-size:.9rem;
    font-weight:700;

    white-space:nowrap;

    box-shadow:var(--shadow-sm);

    transition:.25s ease;
}

.cat-pill:hover{
    transform:translateY(-2px);
}

.cat-pill.active{
    background:linear-gradient(135deg,var(--brand),#ff7b7b);
    color:#fff;
    box-shadow:0 10px 24px rgba(255,77,79,.24);
}

/* =========================
   FILTER BAR
========================= */

.bg-white.border-bottom.py-2{
    background:transparent!important;
    border:none!important;
}

.filter-date-input{
    border:none;
    background:#fff;
    border-radius:14px;
    padding:12px 16px;
    box-shadow:var(--shadow-sm);
}

/* =========================
   REMOVE BROKEN HERO
========================= */

.hero-section,
.hero-wrapper,
.hero-content,
.hero-banner,
.hero-overlay,
.hero-area,
.stats-card,
.stats-box,
.floating-stats,
.counter-box,
.big-text,
.bg-text,
.hero-bg-text,
.exam-counter{
    display:none!important;
}

/* =========================
   BLOG CARDS
========================= */

.blog-card{
    background:#fff;

    border-radius:28px;

    overflow:hidden;

    border:1px solid #edf0f5;

    box-shadow:var(--shadow-md);

    transition:.35s ease;

    height:100%;
}

.blog-card:hover{
    transform:translateY(-8px);
    box-shadow:var(--shadow-lg);
}

.blog-card-img,
.blog-card-img-placeholder{
    height:230px;
}

.blog-card-img{
    width:100%;
    object-fit:cover;
}

.blog-card-img-placeholder{
    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(135deg,#111827,var(--brand));

    color:#fff;

    font-size:3rem;
}

.blog-card-body{
    padding:24px;
}

.blog-category-tag{
    display:inline-block;

    margin-bottom:14px;

    background:#fff1f2;

    color:var(--brand);

    padding:7px 14px;

    border-radius:999px;

    font-size:.72rem;
    font-weight:800;
}

.blog-card-title{
    font-size:1.3rem;

    font-family:var(--display);

    font-weight:700;

    line-height:1.35;

    margin-bottom:12px;

    color:var(--text);
}

.blog-card-desc{
    color:var(--muted);
    margin-bottom:22px;
}

.blog-card-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;

    border-top:1px solid #eef2f7;

    padding-top:18px;
}

.blog-date{
    color:#94a3b8;
    font-size:.82rem;
    font-weight:600;
}

.btn-read-more{
    background:linear-gradient(135deg,var(--brand),#ff7b7b);

    color:#fff;

    text-decoration:none;

    padding:10px 18px;

    border-radius:14px;

    font-weight:700;

    transition:.25s ease;
}

.btn-read-more:hover{
    color:#fff;
    transform:translateY(-2px);
}

/* =========================
   EMPTY STATE
========================= */

.text-center.py-5{
    background:#fff;

    border-radius:30px;

    padding:80px 40px!important;

    border:1px solid #edf0f5;

    box-shadow:var(--shadow-md);
}

.text-center.py-5 h3,
.text-center.py-5 h4,
.text-center.py-5 p,
.text-center.py-5 span,
.text-center.py-5 small{
    color:var(--text)!important;
    opacity:1!important;
}

/* =========================
   FORCE TEXT VISIBILITY
========================= */

h1,h2,h3,h4,h5,h6,p,span,small,a{
    opacity:1!important;
}

.text-white{
    color:#fff!important;
}

/* =========================
   FOOTER
========================= */

.footer-main{
    margin-top:90px;

    background:#0f172a;

    color:rgba(255,255,255,.7);

    padding:70px 0 30px;
}

.footer-brand{
    color:#fff;

    font-size:2rem;

    font-family:var(--display);

    font-weight:800;
}

.footer-main h6{
    color:#fff!important;
}

.footer-main a{
    color:rgba(255,255,255,.7)!important;
    text-decoration:none;
}

.footer-main a:hover{
    color:#fff!important;
}

.footer-divider{
    border-color:rgba(255,255,255,.08);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .navbar-brand-custom{
        font-size:1.6rem;
    }

    .search-input-group input{
        height:62px;
        border-radius:20px;
        font-size:.95rem;
    }

    .cat-pill{
        padding:11px 18px;
        font-size:.82rem;
    }

    .blog-card-img,
    .blog-card-img-placeholder{
        height:190px;
    }

    .blog-card-body{
        padding:20px;
    }

    .blog-card-title{
        font-size:1.1rem;
    }

    .blog-card-footer{
        flex-direction:column;
        align-items:flex-start;
        gap:12px;
    }

}

    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar-main">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand-custom">
                <span class="brand-dot"></span> BlogYaari
            </a>
            <div class="d-none d-md-flex align-items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link-custom">Home</a>
                <a href="{{ route('home') }}#categories" class="nav-link-custom">Categories</a>
                <a href="{{ route('admin.login') }}" class="nav-link-custom">
                    <i class="bi bi-shield-lock me-1"></i>Admin
                </a>
            </div>
            <button class="navbar-toggler-custom d-md-none" onclick="document.getElementById('mobile-menu').classList.toggle('d-none')">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div id="mobile-menu" class="d-none d-md-none pb-3">
            <a href="{{ route('home') }}" class="nav-link-custom d-block">Home</a>
            <a href="{{ route('admin.login') }}" class="nav-link-custom d-block">Admin Panel</a>
        </div>
    </div>
</nav>

<!-- Search Bar -->
<div class="search-bar-wrapper">
    <div class="container">
        <div class="search-input-group">
            <input type="text" id="global-search" placeholder="Search exams, admit cards, results..." autocomplete="off">
            <i class="bi bi-search search-icon"></i>
        </div>
    </div>
</div>

<!-- Category Strip -->
<div class="category-strip" id="categories">
    <div class="container">
        <div class="category-strip-inner">
            <button class="cat-pill active" data-category="">All Posts</button>
            <button class="cat-pill" data-category="Admit Card">Admit Card</button>
            <button class="cat-pill" data-category="Answer Key">Answer Key</button>
            <button class="cat-pill" data-category="Calendar">Calendar</button>
            <button class="cat-pill" data-category="Exam Date Information">Exam Dates</button>
            <button class="cat-pill" data-category="Result">Result</button>
        </div>
    </div>
</div>

<!-- Date Filter Bar -->
<div class="bg-white border-bottom py-2">
    <div class="container d-flex align-items-center gap-3 flex-wrap">
        <small class="text-muted fw-medium">Filter by date:</small>
        <input type="date" id="date-filter" class="filter-date-input">
        <button id="clear-filters" class="btn btn-sm btn-outline-secondary" style="font-size:0.78rem; display:none;">
            <i class="bi bi-x-circle me-1"></i>Clear Filters
        </button>
    </div>
</div>

<!-- Main Content -->
<main class="py-4">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-4 mb-md-0">
                <div class="footer-brand"><span style="color:var(--brand)">Blog</span>Yaari</div>
                <p style="font-size:0.85rem;">Your go-to source for exam updates, admit cards, answer keys, and results across all major competitive examinations.</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h6 class="text-white mb-3" style="font-family:var(--font-display)">Categories</h6>
                <div style="font-size:0.85rem; line-height:2">
                    <a href="#" class="d-block text-decoration-none" style="color:rgba(255,255,255,0.5)">Admit Card</a>
                    <a href="#" class="d-block text-decoration-none" style="color:rgba(255,255,255,0.5)">Answer Key</a>
                    <a href="#" class="d-block text-decoration-none" style="color:rgba(255,255,255,0.5)">Exam Dates</a>
                    <a href="#" class="d-block text-decoration-none" style="color:rgba(255,255,255,0.5)">Results</a>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="text-white mb-3" style="font-family:var(--font-display)">Admin Access</h6>
                <a href="{{ route('admin.login') }}" class="btn btn-sm" style="background:var(--brand);color:white;border-radius:6px;font-size:0.82rem;">
                    <i class="bi bi-shield-lock me-1"></i> Admin Panel
                </a>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="text-center" style="font-size:0.78rem;">
            &copy; {{ date('Y') }} BlogYaari. Built with Laravel & Bootstrap.
        </div>
    </div>
</footer>

<!-- jQuery + Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Global CSRF setup
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // ── AJAX Search & Filter Logic ──────────────────────────────
    let searchTimer = null;

    function getCurrentFilters() {
        return {
            query: $('#global-search').val().trim(),
            category: $('.cat-pill.active').data('category') || '',
            date: $('#date-filter').val() || ''
        };
    }

    function updateClearButton() {
        const f = getCurrentFilters();
        const hasFilter = f.query || f.category || f.date;
        $('#clear-filters').toggle(!!hasFilter);
    }

    function fetchBlogs() {
        const filters = getCurrentFilters();
        $('#loading-spinner').show();
        $('#blog-container').css('opacity', '0.4');

        $.ajax({
            url: '{{ route("blog.search") }}',
            type: 'GET',
            data: filters,
            success: function(html) {
                $('#blog-container').html(html).css('opacity', '1');
                $('#loading-spinner').hide();
            },
            error: function() {
                $('#loading-spinner').hide();
                $('#blog-container').css('opacity', '1');
            }
        });
    }

    // Search on keyup (debounced)
    $('#global-search').on('keyup', function() {
        clearTimeout(searchTimer);
        updateClearButton();
        searchTimer = setTimeout(fetchBlogs, 350);
    });

    // Category pill click
    $(document).on('click', '.cat-pill', function() {
        $('.cat-pill').removeClass('active');
        $(this).addClass('active');
        updateClearButton();
        fetchBlogs();
    });

    // Date filter change
    $('#date-filter').on('change', function() {
        updateClearButton();
        fetchBlogs();
    });

    // Clear all filters
    $('#clear-filters').on('click', function() {
        $('#global-search').val('');
        $('#date-filter').val('');
        $('.cat-pill').removeClass('active');
        $('.cat-pill[data-category=""]').addClass('active');
        $(this).hide();
        fetchBlogs();
    });
</script>

@stack('scripts')
</body>
</html>
