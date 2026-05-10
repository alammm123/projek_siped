<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — Sistem Pengajuan Dokumen</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --teal-900: #0d3d3d;
            --teal-800: #0f5151;
            --teal-700: #136b6b;
            --teal-600: #178080;
            --teal-400: #2ab5b5;
            --teal-200: #a8e6e6;
            --teal-50:  #edfafa;
            --gold:     #e8b84b;
            --gold-light: #f5d485;
            --red-soft: #c0392b;
            --text-dark: #1a2e2e;
            --text-mid:  #3d5c5c;
            --text-soft: #6b8e8e;
            --white:     #ffffff;
            --card-bg:   rgba(255,255,255,0.97);
            --input-border: #b2d8d8;
            --shadow-card: 0 32px 80px rgba(13,61,61,0.22), 0 2px 8px rgba(13,61,61,0.08);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--teal-900) 0%, var(--teal-700) 50%, var(--teal-800) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative background circles */
        body::before {
            content: '';
            position: fixed;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(42,181,181,0.12) 0%, transparent 70%);
            top: -200px; right: -150px;
            pointer-events: none;
        }
        body::after {
            content: '';
            position: fixed;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,184,75,0.08) 0%, transparent 70%);
            bottom: -100px; left: -100px;
            pointer-events: none;
        }

        /* Grid pattern overlay */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 920px;
            animation: fadeUp 0.6s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Top header bar */
        .header-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            padding: 0 4px;
            animation: fadeUp 0.6s 0.1s cubic-bezier(0.22,1,0.36,1) both;
        }

        .header-logo {
            width: 48px; height: 48px;
            background: var(--gold);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 16px rgba(232,184,75,0.35);
        }

        .header-text h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--white);
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .header-text p {
            font-size: 0.78rem;
            color: var(--teal-200);
            font-weight: 400;
            margin-top: 1px;
        }

        /* Main card */
        .card {
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: var(--shadow-card);
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.6);
        }

        /* Left: Form Panel */
        .form-panel {
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--teal-50);
            color: var(--teal-700);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 5px 12px;
            border-radius: 100px;
            margin-bottom: 20px;
            border: 1px solid var(--teal-200);
        }
        .form-eyebrow::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--teal-600);
        }

        .form-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--text-dark);
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 0.875rem;
            color: var(--text-soft);
            margin-bottom: 32px;
            line-height: 1.5;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .alert-error {
            background: #fff5f5;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
        }

        /* Form fields */
        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 7px;
            letter-spacing: 0.01em;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-soft);
            pointer-events: none;
            display: flex;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 1.5px solid var(--input-border);
            border-radius: 12px;
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text-dark);
            background: #f8fefe;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        input:focus {
            border-color: var(--teal-600);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(23,128,128,0.12);
        }

        input.is-invalid {
            border-color: #f87171;
            background: #fff5f5;
        }

        .field-error {
            font-size: 0.76rem;
            color: #ef4444;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-soft);
            padding: 4px;
            display: flex;
            transition: color 0.2s;
        }
        .toggle-password:hover { color: var(--teal-700); }

        /* Buttons */
        .btn-row {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-login {
            flex: 1;
            padding: 13px 24px;
            background: linear-gradient(135deg, var(--teal-700), var(--teal-600));
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            letter-spacing: 0.02em;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(19,107,107,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, var(--teal-800), var(--teal-700));
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(19,107,107,0.38);
        }
        .btn-login:active { transform: translateY(0); }

        .btn-clear {
            padding: 13px 22px;
            background: transparent;
            color: var(--text-soft);
            border: 1.5px solid var(--input-border);
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-clear:hover {
            border-color: var(--teal-400);
            color: var(--teal-700);
            background: var(--teal-50);
        }

        /* Right: Info Panel */
        .info-panel {
            background: linear-gradient(155deg, var(--teal-800) 0%, var(--teal-900) 100%);
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .info-panel::before {
            content: '';
            position: absolute;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(42,181,181,0.15) 0%, transparent 70%);
            top: -80px; right: -80px;
        }
        .info-panel::after {
            content: '';
            position: absolute;
            width: 180px; height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,184,75,0.1) 0%, transparent 70%);
            bottom: 20px; left: -40px;
        }

        .info-content { position: relative; z-index: 2; }

        .mascot-wrap {
            width: 100px; height: 100px;
            background: linear-gradient(135deg, rgba(232,184,75,0.2), rgba(42,181,181,0.15));
            border-radius: 24px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 28px;
            font-size: 52px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .info-tag {
            display: inline-block;
            background: rgba(232,184,75,0.2);
            color: var(--gold-light);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            padding: 4px 12px;
            border-radius: 100px;
            margin-bottom: 16px;
            border: 1px solid rgba(232,184,75,0.3);
        }

        .info-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--white);
            letter-spacing: -0.02em;
            line-height: 1.25;
            margin-bottom: 16px;
        }

        .info-text {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.65);
            line-height: 1.7;
            margin-bottom: 32px;
        }

        .info-features {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .feature-dot {
            width: 32px; height: 32px;
            border-radius: 10px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.75);
            font-weight: 500;
        }

        /* Footer */
        .info-footer {
            position: relative;
            z-index: 2;
            padding-top: 28px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .info-footer p {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.35);
        }

        /* Page footer */
        .page-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.35);
            animation: fadeUp 0.6s 0.2s cubic-bezier(0.22,1,0.36,1) both;
        }

        /* Responsive */
        @media (max-width: 680px) {
            .card { grid-template-columns: 1fr; }
            .info-panel { display: none; }
            .form-panel { padding: 36px 28px; }
        }
    </style>
</head>
<body>
<div class="bg-grid"></div>

<div class="wrapper">
    <!-- Top Header -->
    <div class="header-bar">
        <div class="header-logo">🎓</div>
        <div class="header-text">
            <h1>Sistem Pengajuan Dokumen</h1>
            <p>Portal Terpadu Mahasiswa &amp; Dosen</p>
        </div>
    </div>

    <!-- Card -->
    <div class="card">

        <!-- ── LEFT: Form Panel ── -->
        <div class="form-panel">
            <span class="form-eyebrow">Autentikasi Pengguna</span>
            <h2 class="form-title">Selamat Datang Kembali</h2>
            <p class="form-subtitle">Masukkan kredensial Anda untuk mengakses sistem.</p>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert alert-success">
                    ✅ {{ session('status') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    ⚠️ Username atau password yang Anda masukkan salah.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username / Email -->
                <div class="field">
                    <label for="email">Username / Email</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </span>
                        <input
                            type="text"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan username atau email"
                            autocomplete="username"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                            required autofocus
                        >
                    </div>
                    @error('email')
                        <div class="field-error">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword()" title="Tampilkan password">
                            <svg id="eye-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="btn-row">
                    <button type="submit" class="btn-login">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <polyline points="10 17 15 12 10 7"/>
                            <line x1="15" y1="12" x2="3" y2="12"/>
                        </svg>
                        Masuk
                    </button>
                    <button type="reset" class="btn-clear">Hapus</button>
                </div>

                {{-- Forgot Password (opsional) --}}
                @if (Route::has('password.request'))
                    <p style="margin-top:20px; font-size:0.82rem; text-align:center; color:var(--text-soft);">
                        Lupa password?
                        <a href="{{ route('password.request') }}" style="color:var(--teal-700); font-weight:600; text-decoration:none;">
                            Reset di sini
                        </a>
                    </p>
                @endif
            </form>
        </div>

        <!-- ── RIGHT: Info Panel ── -->
        <div class="info-panel">
            <div class="info-content">
                <div class="mascot-wrap">🎓</div>
                <span class="info-tag">Portal Akademik</span>
                <h3 class="info-heading">Single Sign-On Sistem Pengajuan Dokumen</h3>
                <p class="info-text">
                    Gunakan satu akun untuk mengakses seluruh layanan dan aplikasi yang tersedia di sistem Pengajuan Dokumen kami.
                </p>
                <div class="info-features">
                    <div class="feature-item">
                        <div class="feature-dot">📋</div>
                        <span class="feature-text">Manajemen data akademik terpusat</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-dot">🔒</div>
                        <span class="feature-text">Autentikasi aman &amp; terenkripsi</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-dot">⚡</div>
                        <span class="feature-text">Akses cepat ke semua layanan</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-dot">📱</div>
                        <span class="feature-text">Responsif di semua perangkat</span>
                    </div>
                </div>
            </div>
            <div class="info-footer">
                <p>Butuh bantuan? Hubungi administrator sistem<br>atau email: <strong>admin@sistem.ac.id</strong></p>
            </div>
        </div>

    </div>

    <div class="page-footer">
        &copy; {{ date('Y') }} Sistem Pengajuan Dokumen Kelompok &mdash; Dibuat dengan Laravel
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eye-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                <line x1="1" y1="1" x2="23" y2="23"/>`;
        } else {
            input.type = 'password';
            icon.innerHTML = `
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>`;
        }
    }
</script>
</body>
</html>