<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Dokumen — Sistem Informasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --teal-900: #0d3d3d; --teal-800: #0f5151; --teal-700: #136b6b;
            --teal-600: #178080; --teal-400: #2ab5b5; --teal-200: #a8e6e6;
            --teal-50: #edfafa; --gold: #e8b84b;
            --text-dark: #1a2e2e; --text-mid: #3d5c5c; --text-soft: #6b8e8e;
            --white: #ffffff; --input-border: #b2d8d8;
        }
        body { font-family: 'DM Sans', sans-serif; min-height: 100vh; background: #f0f9f9; }

        .navbar { background: linear-gradient(135deg, var(--teal-900), var(--teal-800)); padding: 0 32px; height: 64px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 16px rgba(13,61,61,0.2); position: sticky; top: 0; z-index: 100; }
        .nav-brand { display: flex; align-items: center; gap: 12px; }
        .nav-logo { width: 36px; height: 36px; background: var(--gold); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .nav-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--white); }
        .nav-right { display: flex; align-items: center; gap: 10px; }
        .nav-avatar { width: 34px; height: 34px; background: linear-gradient(135deg, var(--teal-400), var(--teal-600)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.82rem; color: var(--white); border: 2px solid rgba(255,255,255,0.2); }
        .nav-name { font-size: 0.875rem; color: rgba(255,255,255,0.85); font-weight: 500; }
        .btn-nav { display: flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.85); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.8rem; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-nav:hover { background: rgba(255,255,255,0.2); color: var(--white); }

        .breadcrumb { max-width: 820px; margin: 0 auto; padding: 20px 24px 0; display: flex; align-items: center; gap: 8px; font-size: 0.8rem; color: var(--text-soft); }
        .breadcrumb a { color: var(--teal-700); text-decoration: none; font-weight: 500; }

        .main { max-width: 820px; margin: 0 auto; padding: 20px 24px 48px; display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start; }
        .page-header { grid-column: 1/-1; margin-bottom: 4px; display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        .page-header h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.6rem; color: var(--text-dark); letter-spacing: -0.03em; }
        .page-header p { font-size: 0.875rem; color: var(--text-soft); margin-top: 4px; }
        .btn-back { display: flex; align-items: center; gap: 6px; padding: 10px 18px; background: var(--white); color: var(--text-mid); border: 1.5px solid var(--input-border); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 0.85rem; text-decoration: none; transition: all 0.2s; white-space: nowrap; }
        .btn-back:hover { border-color: var(--teal-400); color: var(--teal-700); }

        /* Status Banner */
        .status-banner { grid-column: 1/-1; border-radius: 18px; padding: 28px 32px; display: flex; align-items: center; gap: 24px; }
        .status-banner.pending  { background: linear-gradient(135deg, #fffbeb, #fef3c7); border: 1px solid #fde68a; }
        .status-banner.approved { background: linear-gradient(135deg, #f0fdf4, #dcfce7); border: 1px solid #bbf7d0; }
        .status-banner.rejected { background: linear-gradient(135deg, #fff5f5, #fee2e2); border: 1px solid #fecaca; }
        .status-emoji { font-size: 52px; flex-shrink: 0; }
        .status-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 1.3rem; letter-spacing: -0.02em; }
        .status-title.pending  { color: #92400e; }
        .status-title.approved { color: #15803d; }
        .status-title.rejected { color: #b91c1c; }
        .status-desc { font-size: 0.875rem; margin-top: 4px; }
        .status-desc.pending  { color: #a16207; }
        .status-desc.approved { color: #166534; }
        .status-desc.rejected { color: #991b1b; }

        /* Detail Card */
        .detail-card { background: var(--white); border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(13,61,61,0.08); border: 1px solid rgba(42,181,61,0.1); }
        .card-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1rem; color: var(--text-dark); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid #e5f5f5; display: flex; align-items: center; gap: 8px; }
        .detail-row { display: flex; justify-content: space-between; align-items: flex-start; padding: 10px 0; border-bottom: 1px solid #f3f9f9; gap: 16px; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-size: 0.82rem; color: var(--text-soft); font-weight: 500; flex-shrink: 0; }
        .detail-value { font-size: 0.875rem; color: var(--text-dark); font-weight: 600; text-align: right; }
        .detail-notes { font-size: 0.875rem; color: var(--text-mid); text-align: right; font-style: italic; font-weight: 400; }

        .btn-download { display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; margin-top: 20px; padding: 12px 20px; background: linear-gradient(135deg, var(--teal-700), var(--teal-600)); color: var(--white); border: none; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.9rem; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 16px rgba(19,107,107,0.25); }
        .btn-download:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(19,107,107,0.35); }

        /* Timeline */
        .timeline-card { background: var(--white); border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(13,61,61,0.08); border: 1px solid rgba(42,181,181,0.1); }
        .timeline { display: flex; flex-direction: column; gap: 0; margin-top: 4px; }
        .tl-item { display: flex; gap: 16px; }
        .tl-left { display: flex; flex-direction: column; align-items: center; flex-shrink: 0; }
        .tl-dot { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; border: 2px solid; flex-shrink: 0; }
        .tl-dot.done-teal    { background: var(--teal-50); border-color: var(--teal-400); }
        .tl-dot.done-green   { background: #f0fdf4;  border-color: #22c55e; }
        .tl-dot.done-yellow  { background: #fffbeb;  border-color: #f59e0b; }
        .tl-dot.done-red     { background: #fff5f5;  border-color: #ef4444; }
        .tl-dot.inactive     { background: #f5f5f5;  border-color: #d1d5db; filter: grayscale(1); opacity: 0.5; }
        .tl-line { width: 2px; flex: 1; min-height: 20px; margin: 4px 0; }
        .tl-line.active   { background: var(--teal-200); }
        .tl-line.inactive { background: #e5e7eb; }
        .tl-content { padding-bottom: 24px; flex: 1; }
        .tl-item:last-child .tl-content { padding-bottom: 0; }
        .tl-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: var(--text-dark); margin-top: 6px; }
        .tl-title.inactive-text { color: var(--text-soft); }
        .tl-time { font-size: 0.78rem; color: var(--text-soft); margin-top: 3px; }
        .tl-desc { font-size: 0.82rem; color: var(--text-mid); margin-top: 5px; line-height: 1.5; }

        @media (max-width: 660px) { .main { grid-template-columns: 1fr; } .navbar { padding: 0 16px; } .nav-name { display: none; } }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="nav-brand">
        <div class="nav-logo">🎓</div>
        <span class="nav-title">Sistem Informasi Akademik</span>
    </div>
    <div class="nav-right">
        <div class="nav-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <span class="nav-name">{{ Auth::user()->name }}</span>
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
    <a href="{{ route('dashboard') }}">Dashboard</a> <span>›</span>
    <a href="{{ route('documents.index') }}">Dokumen Saya</a> <span>›</span>
    <span>Tracking #{{ $document->id }}</span>
</div>

<div class="main">

    <div class="page-header">
        <div>
            <h1>🔍 Tracking Pengajuan</h1>
            <p>Pantau status dokumen yang sudah kamu ajukan.</p>
        </div>
        <a href="{{ route('documents.index') }}" class="btn-back">← Kembali</a>
    </div>

    {{-- Status Banner --}}
    <div class="status-banner {{ $document->status }}">
        @if ($document->status === 'pending')
            <div class="status-emoji">⏳</div>
            <div>
                <div class="status-title pending">Sedang Diproses</div>
                <div class="status-desc pending">Dokumenmu sedang menunggu verifikasi dari admin. Proses berlangsung 1–3 hari kerja.</div>
            </div>
        @elseif ($document->status === 'approved')
            <div class="status-emoji">✅</div>
            <div>
                <div class="status-title approved">Dokumen Disetujui</div>
                <div class="status-desc approved">Selamat! Dokumenmu telah diverifikasi dan disetujui oleh admin.</div>
            </div>
        @else
            <div class="status-emoji">❌</div>
            <div>
                <div class="status-title rejected">Dokumen Ditolak</div>
                <div class="status-desc rejected">Maaf, dokumenmu tidak dapat disetujui. Silakan ajukan ulang dengan dokumen yang sesuai.</div>
            </div>
        @endif
    </div>

    {{-- Detail Dokumen --}}
    <div class="detail-card">
        <div class="card-title">📋 Detail Dokumen</div>

        <div class="detail-row">
            <span class="detail-label">ID Pengajuan</span>
            <span class="detail-value">#{{ str_pad($document->id, 5, '0', STR_PAD_LEFT) }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Jenis Dokumen</span>
            <span class="detail-value">{{ $document->documentType->name }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Nama File</span>
            <span class="detail-value" style="font-size:0.78rem">{{ $document->original_filename }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal Diajukan</span>
            <span class="detail-value">{{ $document->created_at->format('d M Y, H:i') }} WIB</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Terakhir Update</span>
            <span class="detail-value">{{ $document->updated_at->format('d M Y, H:i') }} WIB</span>
        </div>
        @if ($document->notes)
        <div class="detail-row">
            <span class="detail-label">Catatan</span>
            <span class="detail-notes">{{ $document->notes }}</span>
        </div>
        @endif

        <a href="{{ route('documents.download', $document->id) }}" class="btn-download">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download Dokumen
        </a>
    </div>

    {{-- Timeline Tracking --}}
    <div class="timeline-card">
        <div class="card-title">📍 Timeline Status</div>
        <div class="timeline">

            {{-- Step 1: Submitted --}}
            <div class="tl-item">
                <div class="tl-left">
                    <div class="tl-dot done-teal">📤</div>
                    <div class="tl-line active"></div>
                </div>
                <div class="tl-content">
                    <div class="tl-title">Dokumen Diajukan</div>
                    <div class="tl-time">{{ $document->created_at->format('d M Y, H:i') }} WIB</div>
                    <div class="tl-desc">Dokumen berhasil diterima oleh sistem dan menunggu proses verifikasi.</div>
                </div>
            </div>

            {{-- Step 2: In Review --}}
            <div class="tl-item">
                <div class="tl-left">
                    @if ($document->status !== 'pending')
                        <div class="tl-dot done-yellow">🔎</div>
                        <div class="tl-line {{ $document->status !== 'pending' ? 'active' : 'inactive' }}"></div>
                    @else
                        <div class="tl-dot done-yellow">🔎</div>
                        <div class="tl-line inactive"></div>
                    @endif
                </div>
                <div class="tl-content">
                    <div class="tl-title">Sedang Diverifikasi</div>
                    @if ($document->status !== 'pending')
                        <div class="tl-time">{{ $document->updated_at->format('d M Y, H:i') }} WIB</div>
                        <div class="tl-desc">Admin sedang memeriksa kelengkapan dokumen yang diajukan.</div>
                    @else
                        <div class="tl-time">Menunggu...</div>
                        <div class="tl-desc">Dokumen sedang dalam antrian verifikasi admin.</div>
                    @endif
                </div>
            </div>

            {{-- Step 3: Result --}}
            <div class="tl-item">
                <div class="tl-left">
                    @if ($document->status === 'approved')
                        <div class="tl-dot done-green">✅</div>
                    @elseif ($document->status === 'rejected')
                        <div class="tl-dot done-red">❌</div>
                    @else
                        <div class="tl-dot inactive">⬜</div>
                    @endif
                </div>
                <div class="tl-content">
                    @if ($document->status === 'approved')
                        <div class="tl-title">Dokumen Disetujui</div>
                        <div class="tl-time">{{ $document->updated_at->format('d M Y, H:i') }} WIB</div>
                        <div class="tl-desc">Dokumenmu telah disetujui. Kamu dapat mengunduh dokumen yang telah diverifikasi.</div>
                    @elseif ($document->status === 'rejected')
                        <div class="tl-title">Dokumen Ditolak</div>
                        <div class="tl-time">{{ $document->updated_at->format('d M Y, H:i') }} WIB</div>
                        <div class="tl-desc">Dokumenmu tidak memenuhi syarat. Silakan ajukan ulang dengan dokumen yang sesuai.</div>
                    @else
                        <div class="tl-title inactive-text">Menunggu Keputusan</div>
                        <div class="tl-time">Belum diproses</div>
                        <div class="tl-desc" style="color:var(--text-soft)">Hasil verifikasi akan muncul di sini.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>