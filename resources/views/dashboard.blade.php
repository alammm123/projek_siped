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
            /* Mengubah layout utama menjadi Flexbox (Kiri Kanan) */
            display: flex; 
            height: 100vh;
            overflow: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--teal-900) 0%, var(--teal-800) 100%);
            display: flex;
            flex-direction: column;
            color: var(--white);
            box-shadow: 4px 0 24px rgba(13,61,61,0.15);
            z-index: 10;
        }
        .sidebar-brand {
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-logo {
            width: 32px; height: 32px;
            background: var(--gold);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
        }
        .sidebar-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 1px;
            color: var(--white);
        }
        .sidebar-menu {
            padding: 24px 16px;
            flex: 1;
        }
        .menu-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.2s;
            margin-bottom: 8px;
        }
        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.1);
            color: var(--white);
        }
        .menu-item.active {
            border-left: 4px solid var(--teal-400);
            background: rgba(255,255,255,0.08);
        }

        /* ================= KONTEN KANAN ================= */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* Navbar di atas (Hanya User Profile & Logout) */
        .navbar {
            background: var(--white);
            padding: 0 32px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: flex-end; /* Posisi ke kanan */
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            z-index: 5;
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-avatar {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--teal-400), var(--teal-600));
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--white);
        }
        .nav-name {
            font-size: 0.9rem;
            color: var(--text-dark);
            font-weight: 600;
        }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #fff0f0;
            color: #dc2626;
            border: 1px solid #fecaca;
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 0.82rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-logout:hover {
            background: #fee2e2;
        }

        /* Area Main Content */
        .main {
            padding: 36px;
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
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
            margin-bottom: 8px;
        }
        .welcome-text p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }
        .welcome-emoji {
            font-size: 64px;
            position: relative; z-index: 1;
        }

        /* ================= DROPDOWN PROFILE ================= */
        .dropdown {
            position: relative;
        }
        .dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 10px;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .dropdown-toggle:hover {
            background: rgba(0,0,0,0.04);
        }
        .dropdown-menu {
            display: none; /* Disembunyikan secara default */
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 1px solid rgba(0,0,0,0.05);
            min-width: 160px;
            z-index: 100;
            overflow: hidden;
        }
        .dropdown-menu.show {
            display: block; /* Ditampilkan saat diklik */
        }
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--text-mid);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            width: 100%;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }
        .dropdown-item:hover {
            background: #f8fafc;
            color: var(--teal-600);
        }
        .dropdown-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 0;
        }

        /* Stats & Info Card (Tetap sama seperti sebelumnya) */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 28px; }
        .stat-card { background: var(--white); border-radius: 16px; padding: 24px; border: 1px solid rgba(42,181,181,0.1); }
        .stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 14px; }
        .stat-icon.blue  { background: #eff6ff; }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.gold  { background: #fffbeb; }
        .stat-value { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.8rem; color: var(--text-dark); }
        .stat-label { font-size: 0.82rem; color: var(--text-soft); margin-top: 4px; }

        .info-card { background: var(--white); border-radius: 16px; padding: 28px 32px; border: 1px solid rgba(42,181,181,0.1); }
        .info-card h3 { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--text-dark); margin-bottom: 20px; padding-bottom: 14px; border-bottom: 1px solid #e5f5f5; }
        .info-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f3f9f9; font-size: 0.875rem; }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: var(--text-soft); font-weight: 500; }
        .info-value { color: var(--text-dark); font-weight: 600; }
        .badge-aktif { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; padding: 3px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 600; }

    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-logo">🎓</div>
            <span class="sidebar-title">SIPED</span>
        </div>
        
        <div class="sidebar-menu">
            <!-- Menu Dashboard (Aktif) -->
            <a href="{{ route('dashboard') }}" class="menu-item active">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="9"></rect>
                    <rect x="14" y="3" width="7" height="5"></rect>
                    <rect x="14" y="12" width="7" height="9"></rect>
                    <rect x="3" y="16" width="7" height="5"></rect>
                </svg>
                Dashboard
            </a>

            <!-- Menu Pengajuan Dokumen -->
            <a href="{{ route('documents.create') }}" class="menu-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                    <line x1="9" y1="15" x2="15" y2="15"></line>
                </svg>
                Pengajuan Dokumen
            </a>
            
            <!-- Menu Riwayat -->
            <a href="{{ route('documents.index') }}" class="menu-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                Riwayat Pengajuan
            </a>
            <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 16px 0;">
        </div>
    </aside>

    <!-- WRAPPER KONTEN KANAN -->
    <div class="main-wrapper">
        
        <!-- Navbar Atas -->
        <nav class="navbar">
            <div class="nav-right">
                
                <!-- Dropdown Profile -->
                <div class="dropdown">
                    <div class="nav-user dropdown-toggle" onclick="toggleDropdown()">
                        <span class="nav-name">{{ Auth::user()->name }}</span>
                        <div class="nav-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                    
                    <!-- Isi Dropdown -->
                    <div class="dropdown-menu" id="profileDropdown">
                        <!-- Link ke Halaman Profil -->
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Profile
                        </a>
                        
                        <div class="dropdown-divider"></div>
                        
                        <!-- Tombol Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </nav>

        <!-- Main Content -->
        <div class="main">
            @if (session('status'))
                <div class="alert-success">✅ {{ session('status') }}</div>
            @endif

            <div class="welcome-card">
                <div class="welcome-text">
                    <h2>Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                    <p>Kamu berhasil masuk ke sistem Pengajuan Dokumen. Semoga harimu menyenangkan.</p>
                </div>
                <div class="welcome-emoji">🎓</div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">📄</div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Pengajuan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon gold">⏳</div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Diproses</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">✅</div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Selesai</div>
                </div>
            </div>

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
    </div>

    <!-- Script Dropdown -->
    <script>
        // Fungsi untuk memunculkan/menyembunyikan menu
        function toggleDropdown() {
            document.getElementById("profileDropdown").classList.toggle("show");
        }

        // Fungsi agar dropdown otomatis tertutup jika user klik di luar area dropdown
        window.onclick = function(event) {
            if (!event.target.closest('.dropdown')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

</body>
</html>