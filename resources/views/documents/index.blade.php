<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Dokumen — Sistem Informasi</title>
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

        body { font-family: 'DM Sans', sans-serif; min-height: 100vh; background: #f0f9f9; }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--teal-900), var(--teal-800));
            padding: 0 32px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 16px rgba(13,61,61,0.2);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-brand { display: flex; align-items: center; gap: 12px; }
        .nav-logo {
            width: 36px; height: 36px; background: var(--gold);
            border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;
        }
        .nav-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--white); }
        .nav-right { display: flex; align-items: center; gap: 12px; }
        .nav-avatar {
            width: 34px; height: 34px;
            background: linear-gradient(135deg, var(--teal-400), var(--teal-600));
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.82rem;
            color: var(--white); border: 2px solid rgba(255,255,255,0.2);
        }
        .nav-name { font-size: 0.875rem; color: rgba(255,255,255,0.85); font-weight: 500; }
        .btn-nav {
            display: flex; align-items: center; gap: 6px;
            padding: 7px 14px;
            background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85);
            border: 1px solid rgba(255,255,255,0.2); border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.8rem;
            cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .btn-nav:hover { background: rgba(255,255,255,0.2); color: var(--white); }
        .btn-nav-gold {
            background: var(--gold); color: var(--teal-900) !important;
            border-color: transparent !important;
        }
        .btn-nav-gold:hover { background: var(--gold-light, #f5d485); }

        /* Breadcrumb */
        .breadcrumb {
            max-width: 1000px; margin: 0 auto; padding: 20px 24px 0;
            display: flex; align-items: center; gap: 8px;
            font-size: 0.8rem; color: var(--text-soft);
        }
        .breadcrumb a { color: var(--teal-700); text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { text-decoration: underline; }

        /* Main */
        .main { max-width: 1000px; margin: 0 auto; padding: 20px 24px 48px; }

        /* Page Header */
        .page-header {
            display: flex; align-items: flex-start; justify-content: space-between;
            margin-bottom: 24px; flex-wrap: wrap; gap: 16px;
        }
        .page-header h1 {
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.6rem;
            color: var(--text-dark); letter-spacing: -0.03em;
        }
        .page-header p { font-size: 0.875rem; color: var(--text-soft); margin-top: 4px; }
        .btn-ajukan {
            display: flex; align-items: center; gap: 8px;
            padding: 12px 22px;
            background: linear-gradient(135deg, var(--teal-700), var(--teal-600));
            color: var(--white); border: none; border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.9rem;
            cursor: pointer; text-decoration: none; transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(19,107,107,0.3);
            white-space: nowrap;
        }
        .btn-ajukan:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(19,107,107,0.38); }

        /* Alert */
        .alert {
            padding: 12px 16px; border-radius: 12px;
            font-size: 0.875rem; font-weight: 500; margin-bottom: 20px;
        }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }

        /* Stats */
        .stats-row {
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;
        }
        .stat-card {
            background: var(--white); border-radius: 14px; padding: 20px;
            box-shadow: 0 2px 12px rgba(13,61,61,0.07);
            border: 1px solid rgba(42,181,181,0.1);
            display: flex; align-items: center; gap: 14px;
        }
        .stat-icon {
            width: 42px; height: 42px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;
        }
        .stat-icon.all     { background: #f0f9f9; }
        .stat-icon.pending { background: #fffbeb; }
        .stat-icon.approve { background: #f0fdf4; }
        .stat-icon.reject  { background: #fff5f5; }
        .stat-val {
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.5rem;
            color: var(--text-dark); letter-spacing: -0.03em; line-height: 1;
        }
        .stat-lbl { font-size: 0.78rem; color: var(--text-soft); margin-top: 3px; }

        /* Filter */
        .filter-bar {
            background: var(--white); border-radius: 14px; padding: 16px 20px;
            box-shadow: 0 2px 12px rgba(13,61,61,0.07);
            border: 1px solid rgba(42,181,181,0.1);
            display: flex; align-items: center; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;
        }
        .filter-label { font-size: 0.82rem; font-weight: 600; color: var(--text-mid); white-space: nowrap; }
        .filter-btn {
            padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 600;
            border: 1.5px solid var(--input-border, #b2d8d8);
            background: transparent; color: var(--text-soft); cursor: pointer;
            transition: all 0.2s;
        }
        .filter-btn.active, .filter-btn:hover { background: var(--teal-700); color: var(--white); border-color: var(--teal-700); }

        /* Table Card */
        .table-card {
            background: var(--white); border-radius: 20px;
            box-shadow: 0 4px 24px rgba(13,61,61,0.08);
            border: 1px solid rgba(42,181,181,0.1);
            overflow: hidden;
        }
        .table-header {
            padding: 20px 24px; border-bottom: 1px solid #e5f5f5;
            display: flex; align-items: center; justify-content: space-between;
        }
        .table-title {
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem;
            color: var(--text-dark); display: flex; align-items: center; gap: 8px;
        }
        .table-count {
            background: var(--teal-50); color: var(--teal-700);
            border: 1px solid var(--teal-200);
            padding: 2px 10px; border-radius: 100px; font-size: 0.75rem; font-weight: 700;
        }

        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f8fefe; }
        th {
            padding: 12px 20px; text-align: left;
            font-size: 0.78rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.06em; color: var(--text-soft);
            border-bottom: 1px solid #e5f5f5;
        }
        td { padding: 16px 20px; border-bottom: 1px solid #f3f9f9; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fefe; }

        .doc-type {
            font-weight: 600; font-size: 0.875rem; color: var(--text-dark);
        }
        .doc-filename {
            font-size: 0.78rem; color: var(--text-soft); margin-top: 3px;
            display: flex; align-items: center; gap: 4px;
        }
        .doc-notes {
            font-size: 0.78rem; color: var(--text-soft);
            max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }

        /* Status badges */
        .badge {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 5px 12px; border-radius: 100px;
            font-size: 0.75rem; font-weight: 700;
        }
        .badge-dot { width: 6px; height: 6px; border-radius: 50%; }
        .badge-pending  { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .badge-approved { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        .badge-rejected { background: #fff5f5; color: #b91c1c; border: 1px solid #fecaca; }
        .dot-pending  { background: #f59e0b; }
        .dot-approved { background: #22c55e; }
        .dot-rejected { background: #ef4444; }

        /* Action buttons */
        .btn-download {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 7px 14px; border-radius: 8px;
            background: var(--teal-50); color: var(--teal-700);
            border: 1px solid var(--teal-200);
            font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: all 0.2s;
        }
        .btn-download:hover { background: var(--teal-200); }

        .date-text { font-size: 0.8rem; color: var(--text-soft); }

        /* Empty state */
        .empty-state {
            padding: 64px 24px; text-align: center;
        }
        .empty-icon { font-size: 56px; margin-bottom: 16px; }
        .empty-title {
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1.1rem;
            color: var(--text-dark); margin-bottom: 8px;
        }
        .empty-sub { font-size: 0.875rem; color: var(--text-soft); margin-bottom: 24px; }
        .btn-empty {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--teal-700), var(--teal-600));
            color: var(--white); border-radius: 12px; text-decoration: none;
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.9rem;
            box-shadow: 0 4px 16px rgba(19,107,107,0.3); transition: all 0.2s;
        }
        .btn-empty:hover { transform: translateY(-1px); }

        @media (max-width: 700px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .navbar { padding: 0 16px; }
            .nav-name { display: none; }
            table { font-size: 0.82rem; }
            th, td { padding: 10px 12px; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-brand">
        <div class="nav-logo">🎓</div>
        <span class="nav-title">Sistem Informasi Akademik</span>
    </div>
    <div class="nav-right">
        <a href="{{ route('dashboard') }}" class="btn-nav">Dashboard</a>
        <div class="nav-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <span class="nav-name">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-nav">
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

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <span>›</span>
    <span>Dokumen Saya</span>
</div>

<div class="main">

    {{-- Alert --}}
    @if (session('status'))
        <div class="alert alert-success">✅ {{ session('status') }}</div>
    @endif

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>📁 Dokumen Saya</h1>
            <p>Riwayat pengajuan dokumen yang pernah kamu kirimkan.</p>
        </div>
        <a href="{{ route('documents.create') }}" class="btn-ajukan">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Ajukan Dokumen
        </a>
    </div>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon all">📄</div>
            <div>
                <div class="stat-val">{{ $documents->count() }}</div>
                <div class="stat-lbl">Total Pengajuan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending">⏳</div>
            <div>
                <div class="stat-val">{{ $documents->where('status','pending')->count() }}</div>
                <div class="stat-lbl">Menunggu</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon approve">✅</div>
            <div>
                <div class="stat-val">{{ $documents->where('status','approved')->count() }}</div>
                <div class="stat-lbl">Disetujui</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon reject">❌</div>
            <div>
                <div class="stat-val">{{ $documents->where('status','rejected')->count() }}</div>
                <div class="stat-lbl">Ditolak</div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="filter-bar">
        <span class="filter-label">Filter:</span>
        <button class="filter-btn active" onclick="filterTable('all', this)">Semua</button>
        <button class="filter-btn" onclick="filterTable('pending', this)">Menunggu</button>
        <button class="filter-btn" onclick="filterTable('approved', this)">Disetujui</button>
        <button class="filter-btn" onclick="filterTable('rejected', this)">Ditolak</button>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <div class="table-header">
            <div class="table-title">
                📋 Riwayat Pengajuan
                <span class="table-count">{{ $documents->count() }} dokumen</span>
            </div>
        </div>

        @if ($documents->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <div class="empty-title">Belum ada pengajuan</div>
                <div class="empty-sub">Kamu belum pernah mengajukan dokumen. Mulai sekarang!</div>
                <a href="{{ route('documents.create') }}" class="btn-empty">
                    + Ajukan Dokumen Pertama
                </a>
            </div>
        @else
            <table id="doc-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Dokumen</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $i => $doc)
                        <tr data-status="{{ $doc->status }}">
                            <td style="color:var(--text-soft);font-size:0.8rem">{{ $i + 1 }}</td>
                            <td>
                                <div class="doc-type">{{ $doc->documentType->name }}</div>
                                <div class="doc-filename">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                    </svg>
                                    {{ $doc->original_filename }}
                                </div>
                            </td>
                            <td>
                                <div class="doc-notes">
                                    {{ $doc->notes ?? '—' }}
                                </div>
                            </td>
                            <td>
                                @if ($doc->status === 'pending')
                                    <span class="badge badge-pending">
                                        <span class="badge-dot dot-pending"></span> Menunggu
                                    </span>
                                @elseif ($doc->status === 'approved')
                                    <span class="badge badge-approved">
                                        <span class="badge-dot dot-approved"></span> Disetujui
                                    </span>
                                @else
                                    <span class="badge badge-rejected">
                                        <span class="badge-dot dot-rejected"></span> Ditolak
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="date-text">
                                    {{ $doc->created_at->format('d M Y') }}
                                </div>
                                <div class="date-text" style="margin-top:2px">
                                    {{ $doc->created_at->format('H:i') }} WIB
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('documents.download', $doc->id) }}" class="btn-download">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="7 10 12 15 17 10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                    Download
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>

<script>
    function filterTable(status, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('#doc-table tbody tr').forEach(row => {
            row.style.display = (status === 'all' || row.dataset.status === status) ? '' : 'none';
        });
    }
</script>
</body>
</html>