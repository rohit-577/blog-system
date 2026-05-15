<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – BlogYaari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #1a1a2e;
            color: #1a1a2e;
        }
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #1a1a2e 0%, #2d1b3d 50%, #1a1a2e 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
            position: relative;
            overflow: hidden;
        }
        .login-left::before {
            content: '';
            position: absolute;
            top: -100px; left: -100px;
            width: 400px; height: 400px;
            background: #e63329;
            opacity: 0.07;
            border-radius: 50%;
        }
        .login-left::after {
            content: '';
            position: absolute;
            bottom: -80px; right: -80px;
            width: 300px; height: 300px;
            background: #ffd166;
            opacity: 0.05;
            border-radius: 50%;
        }
        .login-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 2.4rem;
            color: white;
            margin-bottom: 12px;
            position: relative;
        }
        .login-brand span { color: #e63329; }
        .login-tagline {
            color: rgba(255,255,255,0.45);
            font-size: 0.95rem;
            text-align: center;
            max-width: 280px;
            line-height: 1.7;
            position: relative;
        }
        .login-right {
            width: 440px;
            background: #f4f5f7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
        }
        .login-box {
            width: 100%;
            max-width: 360px;
        }
        .login-box h2 {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.6rem;
            margin-bottom: 6px;
        }
        .login-box p {
            color: #4a4a6a;
            font-size: 0.87rem;
            margin-bottom: 28px;
        }
        label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: #4a4a6a;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            border: 1.5px solid #e2e4e8;
            border-radius: 8px;
            padding: 12px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #1a1a2e;
            background: white;
            transition: border-color 0.2s;
            margin-bottom: 18px;
        }
        input:focus { outline: none; border-color: #e63329; box-shadow: 0 0 0 3px rgba(230,51,41,0.1); }
        .input-group-pw { position: relative; }
        .input-group-pw input { margin-bottom: 18px; padding-right: 42px; }
        .pw-toggle {
            position: absolute; right: 14px; top: 12px;
            color: #4a4a6a; cursor: pointer; border: none;
            background: none; font-size: 1rem;
        }
        .btn-login {
            width: 100%;
            background: #e63329;
            color: white;
            border: none;
            padding: 13px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            margin-top: 4px;
        }
        .btn-login:hover { background: #b8271e; }
        .btn-login:active { transform: scale(0.99); }
        .error-msg {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.84rem;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .hint-box {
            background: white;
            border: 1px dashed #e2e4e8;
            border-radius: 8px;
            padding: 12px 16px;
            margin-top: 20px;
            font-size: 0.78rem;
            color: #4a4a6a;
        }
        .hint-box strong { color: #1a1a2e; }
        @media (max-width: 700px) {
            body { flex-direction: column; }
            .login-left { padding: 40px 20px; min-height: 200px; flex: none; }
            .login-right { width: 100%; padding: 32px 20px; }
            .login-brand { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <div class="login-left">
        <div class="login-brand"><span>Blog</span>Yaari</div>
        <p class="login-tagline">Admin Panel — Manage your blog content, categories and publications.</p>
    </div>

    <div class="login-right">
        <div class="login-box">
            <h2>Welcome back</h2>
            <p>Sign in to access the admin panel</p>

            @if($errors->any())
            <div class="error-msg">
                <i class="bi bi-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="admin@blogsystem.com"
                           required autocomplete="email">
                </div>
                <div class="input-group-pw">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           placeholder="Enter your password"
                           required autocomplete="current-password">
                    <button type="button" class="pw-toggle" onclick="togglePw()">
                        <i class="bi bi-eye" id="pw-icon"></i>
                    </button>
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-shield-lock me-2"></i>Sign In
                </button>
            </form>

            <div class="hint-box">
                <strong>Demo Credentials</strong><br>
                Email: <strong>admin@blogsystem.com</strong><br>
                Password: <strong>admin123</strong>
            </div>
        </div>
    </div>

    <script>
        function togglePw() {
            const pw = document.getElementById('password');
            const icon = document.getElementById('pw-icon');
            if (pw.type === 'password') {
                pw.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                pw.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
</body>
</html>
