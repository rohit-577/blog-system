@extends('layouts.app')

@section('title', 'BlogYaari – Latest Exam Updates')

@section('content')

<div class="container">

```
<!-- Premium Hero Section -->
<div class="mb-5 mt-3">

    <div style="
        background:linear-gradient(135deg,#111827 0%,#1e293b 100%);
        border-radius:32px;
        padding:70px 60px;
        position:relative;
        overflow:hidden;
        box-shadow:0 20px 50px rgba(0,0,0,.12);
    ">

        <!-- Background Glow -->
        <div style="
            position:absolute;
            top:-120px;
            right:-80px;
            width:320px;
            height:320px;
            border-radius:50%;
            background:rgba(255,255,255,.05);
        "></div>

        <div style="
            position:absolute;
            bottom:-100px;
            right:120px;
            width:240px;
            height:240px;
            border-radius:50%;
            background:rgba(239,68,68,.15);
        "></div>

        <div class="row align-items-center position-relative">

            <!-- Left Content -->
            <div class="col-lg-7">

                <div style="
                    display:inline-flex;
                    align-items:center;
                    gap:10px;
                    padding:10px 18px;
                    border-radius:999px;
                    background:rgba(255,255,255,.08);
                    color:rgba(255,255,255,.85);
                    font-size:.82rem;
                    font-weight:700;
                    margin-bottom:28px;
                    letter-spacing:.04em;
                ">
                    <span style="
                        width:8px;
                        height:8px;
                        border-radius:50%;
                        background:#ef4444;
                        display:inline-block;
                    "></span>

                    DAILY EXAM UPDATES
                </div>

                <h1 style="
                    font-size:clamp(2.5rem,5vw,4.6rem);
                    line-height:1.05;
                    font-weight:800;
                    color:#fff;
                    margin-bottom:24px;
                    letter-spacing:-0.04em;
                ">
                    Latest Exam News,
                    Results &
                    Admit Cards
                </h1>

                <p style="
                    color:rgba(255,255,255,.72);
                    font-size:1.08rem;
                    line-height:1.9;
                    max-width:620px;
                    margin-bottom:36px;
                ">
                    Get instant updates on government exams, admit cards,
                    answer keys, schedules and results — all in one modern platform.
                </p>

                <div class="d-flex flex-wrap gap-3">

                    <div style="
                        background:rgba(255,255,255,.08);
                        padding:20px 26px;
                        border-radius:22px;
                        min-width:150px;
                        backdrop-filter:blur(10px);
                    ">
                        <div style="
                            font-size:2rem;
                            font-weight:800;
                            color:#fff;
                            line-height:1;
                        ">
                            {{ \App\Models\Blog::count() }}+
                        </div>

                        <div style="
                            margin-top:8px;
                            color:rgba(255,255,255,.6);
                            font-size:.9rem;
                        ">
                            Articles
                        </div>
                    </div>

                    <div style="
                        background:rgba(255,255,255,.08);
                        padding:20px 26px;
                        border-radius:22px;
                        min-width:150px;
                        backdrop-filter:blur(10px);
                    ">
                        <div style="
                            font-size:2rem;
                            font-weight:800;
                            color:#fff;
                            line-height:1;
                        ">
                            24/7
                        </div>

                        <div style="
                            margin-top:8px;
                            color:rgba(255,255,255,.6);
                            font-size:.9rem;
                        ">
                            Live Updates
                        </div>
                    </div>

                </div>

            </div>

            <!-- Right Side -->
            <div class="col-lg-5 d-none d-lg-block">

                <div style="
                    position:relative;
                    height:100%;
                    min-height:320px;
                ">

                    <div style="
                        position:absolute;
                        top:20px;
                        right:40px;
                        width:260px;
                        height:260px;
                        border-radius:30px;
                        background:linear-gradient(135deg,#ef4444,#f97316);
                        opacity:.95;
                        transform:rotate(12deg);
                        box-shadow:0 30px 60px rgba(239,68,68,.35);
                    "></div>

                    <div style="
                        position:absolute;
                        top:80px;
                        right:120px;
                        width:220px;
                        height:220px;
                        border-radius:28px;
                        background:#fff;
                        padding:28px;
                        box-shadow:0 25px 60px rgba(0,0,0,.15);
                    ">

                        <div style="
                            width:52px;
                            height:52px;
                            border-radius:16px;
                            background:#fee2e2;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            margin-bottom:22px;
                        ">
                            <i class="bi bi-bar-chart-fill" style="
                                color:#ef4444;
                                font-size:1.3rem;
                            "></i>
                        </div>

                        <div style="
                            font-size:1.5rem;
                            font-weight:800;
                            color:#111827;
                            margin-bottom:8px;
                        ">
                            Smart Tracking
                        </div>

                        <div style="
                            color:#6b7280;
                            line-height:1.8;
                            font-size:.95rem;
                        ">
                            Follow every exam update, result and admit card with a clean modern experience.
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Blog Grid -->
<div class="row g-4" id="blog-container">
    @include('blogs._cards', ['blogs' => $blogs])
</div>

<!-- Loading Spinner -->
<div id="loading-spinner" class="mt-5 text-center" style="display:none;">
    <div class="spinner-border text-danger"></div>
</div>
```

</div>

@endsection
