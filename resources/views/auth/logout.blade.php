<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Sistem Pengajuan Dokumen</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
            --text-dark: #1a2e2e;
            --text-mid:  #3d5c5c;
            --text-soft: #6b8e8e;
            --white:     #ffffff;
        }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f9f9;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--teal-900), var(--teal-800));
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 16px rgba(13,61,61,0.2);
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-logo {
            width: 36px; height: 36px;
            background: var(--gold);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
        }
        .nav-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--white);
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--teal-400), var(--teal-600));
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--white);
            border: 2px solid rgba(255,255,255,0.2);
        }
        .nav-name {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.85);
            font-weight: 500;
        }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.85);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 0.82rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-logout:hover {
            background: rgba(255,255,255,0.2);
            color: var(--white);
        }

        /* Main content */
        .main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 36px 24px;
        }

        /* Alert */
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 28px;
        }

        /* Welcome card */
        .welcome-card {
            background: linear-gradient(135deg, var(--teal-800), var(--teal-900));
            border-radius: 20px;
            padding: 36px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(42,181,181,0.15) 0%, transparent 70%);
            top: -100px; right: -50px;
        }
        .welcome-text { position: relative; z-index: 1; }
        .welcome-text h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--white);
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }
        .welcome-text p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.65);
        }
        .welcome-emoji {
            font-size: 64px;
            position: relative; z-index: 1;
        }

        /* Stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(13,61,61,0.07);
            border: 1px solid rgba(42,181,181,0.1);
        }
        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            margin-bottom: 14px;
        }
        .stat-icon.blue  { background: #eff6ff; }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.gold  { background: #fffbeb; }
        .stat-value {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--text-dark);
            letter-spacing: -0.03em;
        }
        .stat-label {
            font-size: 0.82rem;
            color: var(--text-soft);
            margin-top: 4px;
        }

        /* Info card */
        .info-card {
            background: var(--white);
            border-radius: 16px;
            padding: 28px 32px;
            box-shadow: 0 2px 12px rgba(13,61,61,0.07);
            border: 1px solid rgba(42,181,181,0.1);
        }
        .info-card h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--text-dark);
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid #e5f5f5;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f3f9f9;
            font-size: 0.875rem;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: var(--text-soft); font-weight: 500; }
        .info-value { color: var(--text-dark); font-weight: 600; }
        .badge-aktif {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
            padding: 3px 10px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        @media (max-width: 640px) {
            .stats-grid { grid-template-columns: 1fr; }
            .welcome-emoji { display: none; }
            .navbar { padding: 0 16px; }
            .nav-name { display: none; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-brand">
            <div class="nav-logo">🎓</div>
            <span class="nav-title">Sistem Pengajuan Dokumen</span>
        </div>
        <div class="nav-right">
            <div class="nav-user">
                <div class="nav-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span class="nav-name">{{ Auth::user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main -->
    <div class="main">

        @if (session('status'))
            <div class="alert-success">✅ {{ session('status') }}</div>
        @endif

        <!-- Welcome -->
        <div class="welcome-card">
            <div class="welcome-text">
                <h2>Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                <p>Kamu berhasil masuk ke sistem informasi. Semoga harimu menyenangkan.</p>
            </div>
            <div class="welcome-emoji">🎓</div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">📚</div>
                <div class="stat-value">0</div>
                <div class="stat-label">Mata Kuliah Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">✅</div>
                <div class="stat-value">0</div>
                <div class="stat-label">Tugas Selesai</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon gold">🏆</div>
                <div class="stat-value">0</div>
                <div class="stat-label">Prestasi</div>
            </div>
        </div>

        <!-- Info Akun -->
        <div class="info-card">
            <h3>📋 Informasi Akun</h3>
            <div class="info-row">
                <span class="info-label">Nama Lengkap</span>
                <span class="info-value">{{ Auth::user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ Auth::user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Bergabung Sejak</span>
                <span class="info-value">{{ Auth::user()->created_at->format('d F Y') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status Akun</span>
                <span class="badge-aktif">✓ Aktif</span>
            </div>
        </div>

    </div>

</body>
</html>