<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register — Sistem Informasi</title>
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
            max-width: 960px;
            animation: fadeUp 0.6s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

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

        /* Left: Info Panel */
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
            top: -80px; left: -80px;
        }
        .info-panel::after {
            content: '';
            position: absolute;
            width: 180px; height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,184,75,0.1) 0%, transparent 70%);
            bottom: 20px; right: -40px;
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

        .info-steps {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .step-number {
            width: 28px; height: 28px;
            border-radius: 50%;
            background: rgba(42,181,181,0.2);
            border: 1px solid rgba(42,181,181,0.4);
            color: var(--teal-200);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.78rem;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .step-text {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.5;
        }
        .step-text b {
            color: rgba(255,255,255,0.92);
            font-weight: 600;
        }

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

        /* Right: Form Panel */
        .form-panel {
            padding: 44px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
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
            width: fit-content;
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
            font-size: 1.65rem;
            color: var(--text-dark);
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 6px;
        }

        .form-subtitle {
            font-size: 0.875rem;
            color: var(--text-soft);
            margin-bottom: 28px;
            line-height: 1.5;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 18px;
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

        /* Form fields */
        .field {
            margin-bottom: 14px;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 6px;
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
            padding: 11px 14px 11px 42px;
            border: 1.5px solid var(--input-border);
            border-radius: 12px;
            font-size: 0.875rem;
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

        /* Password strength bar */
        .strength-bar {
            height: 4px;
            border-radius: 4px;
            background: #e5e7eb;
            margin-top: 8px;
            overflow: hidden;
        }
        .strength-fill {
            height: 100%;
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s, background 0.3s;
        }
        .strength-label {
            font-size: 0.72rem;
            margin-top: 4px;
            color: var(--text-soft);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 4px 0 16px;
        }
        .divider-line { flex: 1; height: 1px; background: var(--input-border); }
        .divider-text { font-size: 0.72rem; color: var(--text-soft); font-weight: 500; }

        /* Buttons */
        .btn-row {
            display: flex;
            gap: 12px;
            margin-top: 6px;
        }

        .btn-register {
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
        .btn-register:hover {
            background: linear-gradient(135deg, var(--teal-800), var(--teal-700));
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(19,107,107,0.38);
        }
        .btn-register:active { transform: translateY(0); }

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

        .login-link {
            margin-top: 18px;
            font-size: 0.82rem;
            text-align: center;
            color: var(--text-soft);
        }
        .login-link a {
            color: var(--teal-700);
            font-weight: 600;
            text-decoration: none;
        }
        .login-link a:hover { text-decoration: underline; }

        /* Page footer */
        .page-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.35);
            animation: fadeUp 0.6s 0.2s cubic-bezier(0.22,1,0.36,1) both;
        }

        @media (max-width: 680px) {
            .card { grid-template-columns: 1fr; }
            .info-panel { display: none; }
            .form-panel { padding: 36px 28px; }
            .field-row { grid-template-columns: 1fr; }
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
            <h1>Sistem Informasi Akademik</h1>
            <p>Portal Terpadu Mahasiswa &amp; Dosen</p>
        </div>
    </div>

    <!-- Card -->
    <div class="card">

        <!-- ── LEFT: Info Panel ── -->
        <div class="info-panel">
            <div class="info-content">
                <div class="mascot-wrap">📝</div>
                <span class="info-tag">Pendaftaran Akun</span>
                <h3 class="info-heading">Daftarkan Akun Anda Sekarang</h3>
                <p class="info-text">
                    Ikuti langkah mudah berikut untuk mendaftarkan akun dan mengakses seluruh layanan sistem informasi.
                </p>
                <div class="info-steps">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <div class="step-text"><b>Isi data diri</b> lengkap sesuai dengan data resmi Anda.</div>
                    </div>
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <div class="step-text"><b>Buat password</b> yang kuat minimal 8 karakter.</div>
                    </div>
                    <div class="step-item">
                        <div class="step-number">3</div>
                        <div class="step-text"><b>Klik Daftar</b> dan akun Anda langsung aktif.</div>
                    </div>
                    <div class="step-item">
                        <div class="step-number">4</div>
                        <div class="step-text"><b>Login</b> menggunakan email dan password yang sudah didaftarkan.</div>
                    </div>
                </div>
            </div>
            <div class="info-footer">
                <p>Butuh bantuan? Hubungi administrator sistem<br>atau email: <strong>admin@sistem.ac.id</strong></p>
            </div>
        </div>

        <!-- ── RIGHT: Form Panel ── -->
        <div class="form-panel">
            <span class="form-eyebrow">Buat Akun Baru</span>
            <h2 class="form-title">Daftar Sekarang</h2>
            <p class="form-subtitle">Lengkapi data berikut untuk membuat akun baru.</p>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    ⚠️ Periksa kembali data yang Anda masukkan.
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama Depan & Belakang -->
                <div class="field-row">
                    <div class="field">
                        <label for="first_name">Nama Depan</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Nama depan"
                                class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                required autofocus
                            >
                        </div>
                        @error('first_name')
                            <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="last_name">Nama Belakang</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Nama belakang"
                                class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            >
                        </div>
                        @error('last_name')
                            <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="field">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            autocomplete="email"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                            required
                        >
                    </div>
                    @error('email')
                        <div class="field-error">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">keamanan akun</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Password -->
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            oninput="checkStrength(this.value)"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePass('password','eye1')" title="Tampilkan password">
                            <svg id="eye1" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    <div class="strength-bar"><div class="strength-fill" id="strength-fill"></div></div>
                    <div class="strength-label" id="strength-label"></div>
                    @error('password')
                        <div class="field-error">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </span>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePass('password_confirmation','eye2')" title="Tampilkan password">
                            <svg id="eye2" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="field-error">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="btn-row">
                    <button type="submit" class="btn-register">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" y1="8" x2="19" y2="14"/>
                            <line x1="22" y1="11" x2="16" y2="11"/>
                        </svg>
                        Daftar
                    </button>
                    <button type="reset" class="btn-clear" onclick="resetStrength()">Hapus</button>
                </div>

                <p class="login-link">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Masuk di sini</a>
                </p>
            </form>
        </div>

    </div>

    <div class="page-footer">
        &copy; {{ date('Y') }} Sistem Informasi Kelompok &mdash; Dibuat dengan Laravel
    </div>
</div>

<script>
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);
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

    function checkStrength(val) {
        const fill  = document.getElementById('strength-fill');
        const label = document.getElementById('strength-label');
        let score = 0;
        if (val.length >= 8)              score++;
        if (/[A-Z]/.test(val))            score++;
        if (/[0-9]/.test(val))            score++;
        if (/[^A-Za-z0-9]/.test(val))     score++;

        const levels = [
            { pct: '0%',   color: '',          text: '' },
            { pct: '25%',  color: '#ef4444',   text: '⚠ Lemah' },
            { pct: '50%',  color: '#f59e0b',   text: '🔶 Sedang' },
            { pct: '75%',  color: '#3b82f6',   text: '🔷 Kuat' },
            { pct: '100%', color: '#22c55e',   text: '✅ Sangat Kuat' },
        ];

        const lvl = val.length === 0 ? levels[0] : levels[score] || levels[1];
        fill.style.width      = lvl.pct;
        fill.style.background = lvl.color;
        label.textContent     = lvl.text;
        label.style.color     = lvl.color;
    }

    function resetStrength() {
        document.getElementById('strength-fill').style.width = '0%';
        document.getElementById('strength-label').textContent = '';
    }
</script>
</body>
</html>