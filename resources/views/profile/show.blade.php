<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya — Sistem Pengajuan Dokumen</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --teal-900: #0d3d3d; --teal-800: #0f5151; --teal-700: #136b6b;
            --teal-600: #178080; --teal-400: #2ab5b5; --teal-200: #a8e6e6;
            --teal-50: #edfafa; --gold: #e8b84b; --gold-light: #f5d485;
            --text-dark: #1a2e2e; --text-mid: #3d5c5c; --text-soft: #6b8e8e;
            --white: #ffffff; --input-border: #b2d8d8;
        }
        body { font-family: 'DM Sans', sans-serif; min-height: 100vh; background: #f0f9f9; }

        /* Navbar */
        .navbar { background: linear-gradient(135deg, var(--teal-900), var(--teal-800)); padding: 0 32px; height: 64px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 16px rgba(13,61,61,0.2); position: sticky; top: 0; z-index: 100; }
        .nav-brand { display: flex; align-items: center; gap: 12px; }
        .nav-logo { width: 36px; height: 36px; background: var(--gold); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .nav-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--white); }
        .nav-right { display: flex; align-items: center; gap: 10px; }
        .nav-avatar { width: 34px; height: 34px; background: linear-gradient(135deg, var(--teal-400), var(--teal-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.82rem; color: var(--white); border: 2px solid rgba(255,255,255,0.2); overflow: hidden; }
        .nav-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .nav-name { font-size: 0.875rem; color: rgba(255,255,255,0.85); font-weight: 500; }
        .btn-nav { display: flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.8rem; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-nav:hover { background: rgba(255,255,255,0.2); color: var(--white); }

        .breadcrumb { max-width: 900px; margin: 0 auto; padding: 20px 24px 0; display: flex; align-items: center; gap: 8px; font-size: 0.8rem; color: var(--text-soft); }
        .breadcrumb a { color: var(--teal-700); text-decoration: none; font-weight: 500; }

        /* Main Layout */
        .main { max-width: 900px; margin: 0 auto; padding: 20px 24px 48px; display: grid; grid-template-columns: 280px 1fr; gap: 24px; align-items: start; }
        .page-header { grid-column: 1/-1; margin-bottom: 4px; }
        .page-header h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.6rem; color: var(--text-dark); letter-spacing: -0.03em; }
        .page-header p { font-size: 0.875rem; color: var(--text-soft); margin-top: 4px; }

        /* Alert */
        .alert { padding: 12px 16px; border-radius: 12px; font-size: 0.875rem; font-weight: 500; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
        .alert-error   { background: #fff5f5; border: 1px solid #fecaca; color: #b91c1c; }

        /* Profile Card (sidebar) */
        .profile-card { background: var(--white); border-radius: 20px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(13,61,61,0.08); border: 1px solid rgba(42,181,181,0.1); text-align: center; }
        .avatar-wrap { position: relative; width: 96px; height: 96px; margin: 0 auto 16px; }
        .avatar-img { width: 96px; height: 96px; border-radius: 50%; object-fit: cover; border: 3px solid var(--teal-200); }
        .avatar-initials { width: 96px; height: 96px; border-radius: 50%; background: linear-gradient(135deg, var(--teal-400), var(--teal-700)); display: flex; align-items: center; justify-content: center; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 2rem; color: var(--white); border: 3px solid var(--teal-200); }
        .avatar-edit { position: absolute; bottom: 2px; right: 2px; width: 28px; height: 28px; background: var(--teal-700); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 2px solid var(--white); font-size: 12px; transition: background 0.2s; }
        .avatar-edit:hover { background: var(--teal-600); }
        .profile-name { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1.05rem; color: var(--text-dark); margin-bottom: 4px; }
        .profile-email { font-size: 0.8rem; color: var(--text-soft); margin-bottom: 14px; word-break: break-all; }
        .role-badge { display: inline-flex; align-items: center; gap: 6px; padding: 5px 14px; border-radius: 100px; font-size: 0.78rem; font-weight: 700; margin-bottom: 20px; }
        .role-mahasiswa { background: var(--teal-50); color: var(--teal-700); border: 1px solid var(--teal-200); }
        .role-admin { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .profile-divider { border: none; border-top: 1px solid #e5f5f5; margin: 16px 0; }
        .profile-info { text-align: left; display: flex; flex-direction: column; gap: 10px; }
        .pi-row { display: flex; flex-direction: column; gap: 2px; }
        .pi-label { font-size: 0.72rem; font-weight: 600; color: var(--text-soft); text-transform: uppercase; letter-spacing: 0.06em; }
        .pi-value { font-size: 0.85rem; font-weight: 500; color: var(--text-dark); }
        .pi-empty { font-size: 0.85rem; color: var(--text-soft); font-style: italic; }

        /* Avatar Upload Form */
        .avatar-upload-form { margin-top: 16px; }
        .btn-upload-avatar { width: 100%; padding: 9px; background: var(--teal-50); color: var(--teal-700); border: 1.5px solid var(--teal-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.82rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 6px; }
        .btn-upload-avatar:hover { background: var(--teal-200); }

        /* Right Panel */
        .right-panel { display: flex; flex-direction: column; gap: 20px; }

        /* Tab */
        .tab-bar { display: flex; gap: 4px; background: var(--white); border-radius: 14px; padding: 6px; box-shadow: 0 2px 12px rgba(13,61,61,0.07); border: 1px solid rgba(42,181,181,0.1); }
        .tab-btn { flex: 1; padding: 10px 16px; border: none; border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.85rem; cursor: pointer; transition: all 0.2s; background: transparent; color: var(--text-soft); display: flex; align-items: center; justify-content: center; gap: 6px; }
        .tab-btn.active { background: var(--teal-700); color: var(--white); box-shadow: 0 2px 8px rgba(19,107,107,0.25); }
        .tab-btn:not(.active):hover { background: var(--teal-50); color: var(--teal-700); }

        /* Form Card */
        .form-card { background: var(--white); border-radius: 20px; padding: 28px 32px; box-shadow: 0 4px 24px rgba(13,61,61,0.08); border: 1px solid rgba(42,181,181,0.1); display: none; }
        .form-card.active { display: block; }
        .card-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--text-dark); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #e5f5f5; display: flex; align-items: center; gap: 8px; }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .field { margin-bottom: 16px; }
        label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--text-mid); margin-bottom: 6px; }
        .required { color: #ef4444; margin-left: 2px; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-soft); pointer-events: none; display: flex; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 11px 14px 11px 42px; border: 1.5px solid var(--input-border); border-radius: 12px; font-size: 0.875rem; font-family: inherit; color: var(--text-dark); background: #f8fefe; outline: none; transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        input:focus { border-color: var(--teal-600); background: var(--white); box-shadow: 0 0 0 4px rgba(23,128,128,0.12); }
        input:disabled { background: #f3f9f9; color: var(--text-soft); cursor: not-allowed; }
        .is-invalid { border-color: #f87171 !important; background: #fff5f5 !important; }
        .field-error { font-size: 0.76rem; color: #ef4444; margin-top: 5px; }
        .field-hint { font-size: 0.75rem; color: var(--text-soft); margin-top: 4px; display: flex; align-items: center; gap: 4px; }
        .locked-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 0.72rem; font-weight: 600; color: var(--text-soft); background: #f3f9f9; border: 1px solid #e5f5f5; padding: 2px 8px; border-radius: 100px; margin-left: 6px; }

        /* Strength */
        .strength-bar { height: 4px; border-radius: 4px; background: #e5e7eb; margin-top: 8px; overflow: hidden; }
        .strength-fill { height: 100%; border-radius: 4px; width: 0%; transition: width 0.3s, background 0.3s; }
        .strength-label { font-size: 0.72rem; margin-top: 4px; color: var(--text-soft); }

        /* Buttons */
        .btn-row { display: flex; gap: 12px; margin-top: 8px; }
        .btn-save { flex: 1; padding: 12px 24px; background: linear-gradient(135deg, var(--teal-700), var(--teal-600)); color: var(--white); border: none; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 16px rgba(19,107,107,0.3); display: flex; align-items: center; justify-content: center; gap: 8px; }
        .btn-save:hover { background: linear-gradient(135deg, var(--teal-800), var(--teal-700)); transform: translateY(-1px); }

        @media (max-width: 700px) { .main { grid-template-columns: 1fr; } .field-row { grid-template-columns: 1fr; } .navbar { padding: 0 16px; } .nav-name { display: none; } }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">
        <div class="nav-logo">🎓</div>
        <span class="nav-title">Sistem Pengajuan Dokumen</span>
    </div>
    <div class="nav-right">
        <a href="{{ route('dashboard') }}" class="btn-nav">Dashboard</a>
        <a href="{{ route('documents.index') }}" class="btn-nav">📁 Dokumen</a>
        <div class="nav-avatar">
            @if ($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="avatar">
            @else
                {{ strtoupper(substr($user->name, 0, 1)) }}
            @endif
        </div>
        <span class="nav-name">{{ $user->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-nav">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span> <span>Profil Saya</span>
</div>

<div class="main">
    <div class="page-header">
        <h1>👤 Profil Saya</h1>
        <p>Kelola informasi akun dan keamanan akunmu.</p>
    </div>

    {{-- LEFT: Profile Card --}}
    <div>
        <div class="profile-card">
            {{-- Avatar --}}
            <div class="avatar-wrap">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="avatar-img" alt="Foto Profil">
                @else
                    <div class="avatar-initials">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                @endif
                <label for="avatar-input" class="avatar-edit" title="Ganti foto">✏️</label>
            </div>

            {{-- Avatar Upload --}}
            <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" class="avatar-upload-form">
                @csrf
                @method('PATCH')
                <input type="file" id="avatar-input" name="avatar" accept="image/jpg,image/jpeg,image/png" style="display:none" onchange="this.form.submit()">
                @error('avatar') <div class="field-error" style="margin-bottom:8px">⚠ {{ $message }}</div> @enderror
            </form>

            <div class="profile-name">{{ $user->name }}</div>
            <div class="profile-email">{{ $user->email }}</div>

            <span class="role-badge {{ $user->role === 'admin' ? 'role-admin' : 'role-mahasiswa' }}">
                {{ $user->role === 'admin' ? '👑 Admin' : '🎓 Mahasiswa' }}
            </span>

            <hr class="profile-divider">

            <div class="profile-info">
                <div class="pi-row">
                    <span class="pi-label">NIM</span>
                    @if ($user->nim)
                        <span class="pi-value">{{ $user->nim }}</span>
                    @else
                        <span class="pi-empty">Belum diisi</span>
                    @endif
                </div>
                <div class="pi-row">
                    <span class="pi-label">Jurusan</span>
                    @if ($user->jurusan)
                        <span class="pi-value">{{ $user->jurusan }}</span>
                    @else
                        <span class="pi-empty">Belum diisi</span>
                    @endif
                </div>
                <div class="pi-row">
                    <span class="pi-label">Angkatan</span>
                    @if ($user->angkatan)
                        <span class="pi-value">{{ $user->angkatan }}</span>
                    @else
                        <span class="pi-empty">Belum diisi</span>
                    @endif
                </div>
                <div class="pi-row">
                    <span class="pi-label">No. HP</span>
                    @if ($user->phone)
                        <span class="pi-value">{{ $user->phone }}</span>
                    @else
                        <span class="pi-empty">Belum diisi</span>
                    @endif
                </div>
                <div class="pi-row">
                    <span class="pi-label">Bergabung</span>
                    <span class="pi-value">{{ $user->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT: Form Panel --}}
    <div class="right-panel">

        {{-- Alerts --}}
        @if (session('status_profile'))
            <div class="alert alert-success">✅ {{ session('status_profile') }}</div>
        @endif
        @if (session('status_password'))
            <div class="alert alert-success">✅ {{ session('status_password') }}</div>
        @endif

        {{-- Tab Bar --}}
        <div class="tab-bar">
            <button class="tab-btn active" onclick="switchTab('profile', this)">👤 Data Profil</button>
            <button class="tab-btn" onclick="switchTab('password', this)">🔒 Ubah Password</button>
        </div>

        {{-- Tab 1: Data Profil --}}
        <div class="form-card active" id="tab-profile">
            <div class="card-title">✏️ Edit Data Profil</div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="field-row">
                    {{-- Nama --}}
                    <div class="field">
                        <label>Nama Lengkap <span class="required">*</span></label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                        </div>
                        @error('name') <div class="field-error">⚠ {{ $message }}</div> @enderror
                    </div>

                    {{-- Email (locked) --}}
                    <div class="field">
                        <label>Email <span class="locked-badge">🔒 Tidak bisa diubah</span></label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                            <input type="email" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="field-row">
                    {{-- NIM --}}
                    <div class="field">
                        <label>NIM</label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></span>
                            <input type="text" name="nim" value="{{ old('nim', $user->nim) }}" placeholder="Contoh: 2021001234" class="{{ $errors->has('nim') ? 'is-invalid' : '' }}">
                        </div>
                        @error('nim') <div class="field-error">⚠ {{ $message }}</div> @enderror
                    </div>

                    {{-- No HP --}}
                    <div class="field">
                        <label>Nomor HP</label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.5 2 2 0 0 1 3.57 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 9.5a16 16 0 0 0 6.59 6.59l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Contoh: 08123456789" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}">
                        </div>
                        @error('phone') <div class="field-error">⚠ {{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="field-row">
                    {{-- Jurusan --}}
                    <div class="field">
                        <label>Jurusan / Program Studi</label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></span>
                            <input type="text" name="jurusan" value="{{ old('jurusan', $user->jurusan) }}" placeholder="Contoh: Teknik Informatika" class="{{ $errors->has('jurusan') ? 'is-invalid' : '' }}">
                        </div>
                        @error('jurusan') <div class="field-error">⚠ {{ $message }}</div> @enderror
                    </div>

                    {{-- Angkatan --}}
                    <div class="field">
                        <label>Angkatan</label>
                        <div class="input-wrap">
                            <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
                            <input type="text" name="angkatan" value="{{ old('angkatan', $user->angkatan) }}" placeholder="Contoh: 2021" class="{{ $errors->has('angkatan') ? 'is-invalid' : '' }}">
                        </div>
                        @error('angkatan') <div class="field-error">⚠ {{ $message }}</div> @enderror
                    </div>
                </div>
                {{-- Role (locked) --}}
                <div class="field">
                    <label>Peran / Role <span class="locked-badge">🔒 Tidak bisa diubah</span></label>
                    <div class="input-wrap">
                        <span class="input-icon">👑</span>
                        <input type="text" value="{{ ucfirst($user->role) }}" disabled style="padding-left:42px">
                    </div>
                    <div class="field-hint">🔒 Peran hanya dapat diubah oleh administrator sistem.</div>
                </div>

                <div class="btn-row">
                    <button type="submit" class="btn-save">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Tab 2: Ubah Password --}}
        <div class="form-card" id="tab-password">
            <div class="card-title">🔒 Ubah Password</div>
            <form method="POST" action="{{ route('profile.password') }}">
                @csrf
                @method('PATCH')

                {{-- Password Lama --}}
                <div class="field">
                    <label>Password Lama <span class="required">*</span></label>
                    <div class="input-wrap">
                        <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="current_password" placeholder="Masukkan password lama" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}" id="cur-pass">
                        <button type="button" class="toggle-pw" onclick="togglePw('cur-pass','eye-cur')" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-soft);display:flex">
                            <svg id="eye-cur" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('current_password') <div class="field-error">⚠ {{ $message }}</div> @enderror
                </div>

                {{-- Password Baru --}}
                <div class="field">
                    <label>Password Baru <span class="required">*</span></label>
                    <div class="input-wrap">
                        <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
                        <input type="password" name="password" placeholder="Minimal 8 karakter" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" id="new-pass" oninput="checkStrength(this.value)">
                        <button type="button" onclick="togglePw('new-pass','eye-new')" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-soft);display:flex">
                            <svg id="eye-new" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <div class="strength-bar"><div class="strength-fill" id="s-fill"></div></div>
                    <div class="strength-label" id="s-label"></div>
                    @error('password') <div class="field-error">⚠ {{ $message }}</div> @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="field">
                    <label>Konfirmasi Password Baru <span class="required">*</span></label>
                    <div class="input-wrap">
                        <span class="input-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="password_confirmation" placeholder="Ulangi password baru" id="conf-pass">
                        <button type="button" onclick="togglePw('conf-pass','eye-conf')" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-soft);display:flex">
                            <svg id="eye-conf" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="btn-row">
                    <button type="submit" class="btn-save">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    // Tab switching
    function switchTab(tab, btn) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.form-card').forEach(c => c.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('tab-' + tab).classList.add('active');
    }

    // Auto switch ke tab password jika ada error password
    @if (session('tab') === 'password' || $errors->has('current_password') || $errors->has('password'))
        document.addEventListener('DOMContentLoaded', () => {
            switchTab('password', document.querySelectorAll('.tab-btn')[1]);
        });
    @endif

    // Toggle show/hide password
    function togglePw(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>`;
        } else {
            input.type = 'password';
            icon.innerHTML = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
        }
    }

    // Password strength
    function checkStrength(val) {
        const fill  = document.getElementById('s-fill');
        const label = document.getElementById('s-label');
        let score = 0;
        if (val.length >= 8)          score++;
        if (/[A-Z]/.test(val))        score++;
        if (/[0-9]/.test(val))        score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;
        const lvls = [
            { pct:'0%',   color:'',         text:'' },
            { pct:'25%',  color:'#ef4444',  text:'⚠ Lemah' },
            { pct:'50%',  color:'#f59e0b',  text:'🔶 Sedang' },
            { pct:'75%',  color:'#3b82f6',  text:'🔷 Kuat' },
            { pct:'100%', color:'#22c55e',  text:'✅ Sangat Kuat' },
        ];
        const lvl = val.length === 0 ? lvls[0] : lvls[score] || lvls[1];
        fill.style.width      = lvl.pct;
        fill.style.background = lvl.color;
        label.textContent     = lvl.text;
        label.style.color     = lvl.color;
    }
</script>
</body>
</html>