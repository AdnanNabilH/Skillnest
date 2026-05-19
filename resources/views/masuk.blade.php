<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk - SkillNest</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-page">

    @include('partials.header')

    <main class="login-wrapper">

        {{-- ===== LEFT PANEL ===== --}}
        <div class="login-left">

            {{-- Decorations --}}
            <div class="login-deco-circle-blue"></div>
            <div class="login-deco-circle-yellow"></div>
            <div class="login-deco-square-gray"></div>
            <div class="login-deco-square-yellow"></div>

            <div class="login-left-content">

                <span class="login-badge">WELCOME BACK</span>

                <h1 class="login-heading">
                    Masuk dan lanjutkan
                    <span>kolaborasimu</span>
                </h1>

                <p class="login-subtext">
                    Kelola project, cek dashboard, lihat rekomendasi,
                    dan temukan peluang baru di SkillNest.
                </p>

                {{-- Dashboard Mockup --}}
                <div class="login-dashboard-card">

                    <div class="login-dashboard-header">
                        Dashboard Project
                    </div>

                    <div class="login-dashboard-stats">

                        <div class="login-stat-card">
                            <h3>12</h3>
                            <p>Project aktif</p>
                        </div>

                        <div class="login-stat-card login-stat-card--yellow">
                            <h3>4.8</h3>
                            <p>Rating</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ===== RIGHT PANEL ===== --}}
        <div class="login-right">

            <div class="login-form-card">

                <h2 class="login-form-title">Masuk Akun</h2>

                <p class="login-form-sub">
                    Gunakan email dan password yang terdaftar.
                </p>

                <form
                    action="{{ route('login.authenticate') }}"
                    method="POST"
                    class="login-form"
                >
                    @csrf

                    {{-- EMAIL --}}
                    <div class="login-field">
                        <label class="login-label" for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            class="input-field {{ $errors->has('email') ? 'input-error' : '' }}"
                        >

                        @error('email')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="login-field">

                        <label class="login-label" for="password">
                            Password
                        </label>

                        <div class="login-password-wrap">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="input-field {{ $errors->has('password') ? 'input-error' : '' }}"
                            >

                            <button
                                type="button"
                                class="login-eye-btn"
                                id="toggle-password"
                            >

                                {{-- Eye --}}
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg"
                                    width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>

                                {{-- Eye Off --}}
                                <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg"
                                    width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    style="display:none">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>

                            </button>

                        </div>

                        @error('password')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- REMEMBER + FORGOT --}}
                    <div class="login-options">

                        <label class="remember-wrap">
                            <input type="checkbox" name="remember">
                            <span>Ingat saya</span>
                        </label>

                        <a href="#" class="forgot-link">
                            Lupa password?
                        </a>

                    </div>

                    {{-- SUCCESS --}}
                    @if(session('success'))
                        <div class="success-box">
                            ✓ {{ session('success') }}
                        </div>
                    @endif

                    {{-- LOGIN BUTTON --}}
                    <button type="submit" class="login-submit-btn">
                        Masuk
                    </button>

                    {{-- GOOGLE BUTTON --}}
                    <button type="button" class="google-btn">
                        Masuk dengan Google
                    </button>

                </form>

                {{-- REGISTER LINK --}}
                <p class="login-register-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="login-register-anchor">
                        Daftar
                    </a>
                </p>

            </div>

        </div>

    </main>

    @include('partials.footer')

    <script>
        // ---- Show / Hide Password ----
        const togglePwd  = document.getElementById('toggle-password');
        const pwdInput   = document.getElementById('password');
        const eyeIcon    = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');

        togglePwd.addEventListener('click', () => {
            const isHidden = pwdInput.type === 'password';

            pwdInput.type = isHidden ? 'text' : 'password';

            eyeIcon.style.display = isHidden ? 'none' : '';
            eyeOffIcon.style.display = isHidden ? '' : 'none';
        });
    </script>

</body>
</html>