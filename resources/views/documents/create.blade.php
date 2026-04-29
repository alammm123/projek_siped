<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Dokumen — Sistem Informasi</title>
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
            --gold-light: #f5d485;
            --text-dark: #1a2e2e;
            --text-mid:  #3d5c5c;
            --text-soft: #6b8e8e;
            --white:     #ffffff;
            --input-border: #b2d8d8;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: #f0f9f9;
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
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-brand { display: flex; align-items: center; gap: 12px; }
        .nav-logo {
            width: 36px; height: 36px;
            background: var(--gold);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
        }
        .nav-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 1rem;
            color: var(--white);
        }
        .nav-right { display: flex; align-items: center; gap: 12px; }
        .nav-avatar {
            width: 34px; height: 34px;
            background: linear-gradient(135deg, var(--teal-400), var(--teal-600));
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 0.82rem;
            color: var(--white);
            border: 2px solid rgba(255,255,255,0.2);
        }
        .nav-name { font-size: 0.875rem; color: rgba(255,255,255,0.85); font-weight: 500; }
        .btn-nav {
            display: flex; align-items: center; gap: 6px;
            padding: 7px 14px;
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.85);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600; font-size: 0.8rem;
            cursor: pointer; text-decoration: none;
            transition: all 0.2s;
        }
        .btn-nav:hover { background: rgba(255,255,255,0.2); color: var(--white); }

        /* Breadcrumb */
        .breadcrumb {
            max-width: 860px;
            margin: 0 auto;
            padding: 20px 24px 0;
            display: flex; align-items: center; gap: 8px;
            font-size: 0.8rem; color: var(--text-soft);
        }
        .breadcrumb a { color: var(--teal-700); text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb span { color: var(--text-soft); }

        /* Main */
        .main {
            max-width: 860px;
            margin: 0 auto;
            padding: 20px 24px 48px;
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 24px;
            align-items: start;
        }

        /* Page header */
        .page-header {
            grid-column: 1 / -1;
            margin-bottom: 4px;
        }
        .page-header h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800; font-size: 1.6rem;
            color: var(--text-dark); letter-spacing: -0.03em;
        }
        .page-header p { font-size: 0.875rem; color: var(--text-soft); margin-top: 4px; }

        /* Alert */
        .alert {
            grid-column: 1 / -1;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .alert-error   { background: #fff5f5; border: 1px solid #fecaca; color: #b91c1c; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }

        /* Form Card */
        .form-card {
            background: var(--white);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 4px 24px rgba(13,61,61,0.08);
            border: 1px solid rgba(42,181,181,0.1);
        }

        .section-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 1rem;
            color: var(--text-dark);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5f5f5;
            display: flex; align-items: center; gap: 8px;
        }
        .section-icon {
            width: 28px; height: 28px;
            background: var(--teal-50);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
        }

        /* Fields */
        .field { margin-bottom: 20px; }
        label {
            display: block;
            font-size: 0.82rem; font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 7px;
        }
        .required { color: #ef4444; margin-left: 2px; }

        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: var(--text-soft); pointer-events: none; display: flex;
        }

        select,
        textarea {
            width: 100%;
            border: 1.5px solid var(--input-border);
            border-radius: 12px;
            font-size: 0.875rem;
            font-family: inherit;
            color: var(--text-dark);
            background: #f8fefe;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        select {
            padding: 12px 14px 12px 42px;
            appearance: none;
            cursor: pointer;
        }
        textarea {
            padding: 12px 14px;
            resize: vertical;
            min-height: 100px;
            line-height: 1.6;
        }
        select:focus, textarea:focus {
            border-color: var(--teal-600);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(23,128,128,0.12);
        }
        .select-arrow {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            pointer-events: none; color: var(--text-soft);
        }
        .is-invalid { border-color: #f87171 !important; background: #fff5f5 !important; }
        .field-error { font-size: 0.76rem; color: #ef4444; margin-top: 5px; }

        /* File Upload Area */
        .upload-area {
            border: 2px dashed var(--input-border);
            border-radius: 14px;
            padding: 32px 20px;
            text-align: center;
            cursor: pointer;
            background: #f8fefe;
            transition: all 0.2s;
            position: relative;
        }
        .upload-area:hover,
        .upload-area.drag-over {
            border-color: var(--teal-600);
            background: var(--teal-50);
        }
        .upload-area.has-file {
            border-color: #22c55e;
            background: #f0fdf4;
        }
        .upload-area input[type="file"] {
            position: absolute; inset: 0;
            opacity: 0; cursor: pointer; width: 100%; height: 100%;
        }
        .upload-icon { font-size: 36px; margin-bottom: 10px; }
        .upload-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 0.95rem;
            color: var(--text-dark); margin-bottom: 4px;
        }
        .upload-sub { font-size: 0.8rem; color: var(--text-soft); }
        .upload-formats {
            display: flex; justify-content: center; gap: 6px;
            margin-top: 12px; flex-wrap: wrap;
        }
        .format-badge {
            background: var(--teal-50);
            color: var(--teal-700);
            border: 1px solid var(--teal-200);
            padding: 3px 10px;
            border-radius: 100px;
            font-size: 0.72rem; font-weight: 600;
        }
        .file-preview {
            display: none;
            align-items: center; gap: 12px;
            padding: 12px 16px;
            background: #f0fdf4;
            border-radius: 10px;
            margin-top: 12px;
            text-align: left;
        }
        .file-preview.show { display: flex; }
        .file-preview-icon { font-size: 24px; }
        .file-preview-name {
            font-size: 0.85rem; font-weight: 600;
            color: var(--text-dark); flex: 1;
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .file-preview-size { font-size: 0.75rem; color: var(--text-soft); }
        .file-remove {
            background: none; border: none; cursor: pointer;
            color: #ef4444; font-size: 16px; padding: 4px;
        }

        /* Buttons */
        .btn-row { display: flex; gap: 12px; margin-top: 8px; }
        .btn-submit {
            flex: 1; padding: 13px 24px;
            background: linear-gradient(135deg, var(--teal-700), var(--teal-600));
            color: var(--white); border: none; border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 0.9rem;
            cursor: pointer; letter-spacing: 0.02em;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(19,107,107,0.3);
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, var(--teal-800), var(--teal-700));
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(19,107,107,0.38);
        }
        .btn-cancel {
            padding: 13px 22px;
            background: transparent; color: var(--text-soft);
            border: 1.5px solid var(--input-border);
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600; font-size: 0.9rem;
            cursor: pointer; text-decoration: none;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.2s;
        }
        .btn-cancel:hover { border-color: var(--teal-400); color: var(--teal-700); background: var(--teal-50); }

        /* Sidebar */
        .sidebar { display: flex; flex-direction: column; gap: 16px; }

        .info-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 24px rgba(13,61,61,0.08);
            border: 1px solid rgba(42,181,181,0.1);
        }
        .info-card-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 0.9rem;
            color: var(--text-dark);
            margin-bottom: 14px;
            display: flex; align-items: center; gap: 8px;
        }
        .info-list { display: flex; flex-direction: column; gap: 10px; }
        .info-item {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 0.82rem; color: var(--text-mid); line-height: 1.5;
        }
        .info-dot {
            width: 20px; height: 20px;
            background: var(--teal-50); border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; flex-shrink: 0; margin-top: 1px;
        }

        .tip-card {
            background: linear-gradient(135deg, var(--teal-800), var(--teal-900));
            border-radius: 16px; padding: 24px;
        }
        .tip-card-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700; font-size: 0.9rem;
            color: var(--white); margin-bottom: 12px;
        }
        .tip-list { display: flex; flex-direction: column; gap: 8px; }
        .tip-item { font-size: 0.8rem; color: rgba(255,255,255,0.7); display: flex; gap: 8px; line-height: 1.5; }
        .tip-item::before { content: '→'; color: var(--teal-200); flex-shrink: 0; }

        @media (max-width: 700px) {
            .main { grid-template-columns: 1fr; }
            .sidebar { display: none; }
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
        <span class="nav-title">Sistem Informasi Akademik</span>
    </div>
    <div class="nav-right">
        <a href="{{ route('documents.index') }}" class="btn-nav">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
            </svg>
            Riwayat
        </a>
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
    <a href="{{ route('documents.index') }}">Dokumen Saya</a>
    <span>›</span>
    <span>Ajukan Dokumen</span>
</div>

<!-- Main -->
<div class="main">

    <!-- Page Header -->
    <div class="page-header">
        <h1>📄 Ajukan Dokumen</h1>
        <p>Isi form di bawah untuk mengajukan dokumen kepada admin.</p>
    </div>

    {{-- Error --}}
    @if ($errors->any())
        <div class="alert alert-error">⚠️ Periksa kembali data yang Anda masukkan.</div>
    @endif

    {{-- Success --}}
    @if (session('status'))
        <div class="alert alert-success">✅ {{ session('status') }}</div>
    @endif

    <!-- Form Card -->
    <div class="form-card">
        <div class="section-title">
            <div class="section-icon">📋</div>
            Detail Pengajuan
        </div>

        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Pilih Jenis Dokumen --}}
            <div class="field">
                <label for="document_type_id">
                    Jenis Dokumen <span class="required">*</span>
                </label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </span>
                    <select
                        id="document_type_id"
                        name="document_type_id"
                        class="{{ $errors->has('document_type_id') ? 'is-invalid' : '' }}"
                        required
                    >
                        <option value="">— Pilih jenis dokumen —</option>
                        @foreach ($documentTypes as $type)
                            <option
                                value="{{ $type->id }}"
                                {{ old('document_type_id') == $type->id ? 'selected' : '' }}
                            >
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="select-arrow">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </span>
                </div>
                @error('document_type_id')
                    <div class="field-error">⚠ {{ $message }}</div>
                @enderror
            </div>

            {{-- Upload File --}}
            <div class="field">
                <label>File Dokumen <span class="required">*</span></label>
                <div
                    class="upload-area {{ $errors->has('file') ? 'is-invalid' : '' }}"
                    id="upload-area"
                    ondragover="handleDrag(event, true)"
                    ondragleave="handleDrag(event, false)"
                    ondrop="handleDrop(event)"
                >
                    <input
                        type="file"
                        name="file"
                        id="file-input"
                        accept=".pdf,.doc,.docx"
                        onchange="handleFile(this)"
                    >
                    <div id="upload-placeholder">
                        <div class="upload-icon">📂</div>
                        <div class="upload-title">Klik atau seret file ke sini</div>
                        <div class="upload-sub">Format yang didukung:</div>
                        <div class="upload-formats">
                            <span class="format-badge">PDF</span>
                            <span class="format-badge">DOC</span>
                            <span class="format-badge">DOCX</span>
                        </div>
                        <div class="upload-sub" style="margin-top:8px">Ukuran maksimal 5 MB</div>
                    </div>
                </div>

                {{-- File Preview --}}
                <div class="file-preview" id="file-preview">
                    <span class="file-preview-icon">📄</span>
                    <div style="flex:1;min-width:0">
                        <div class="file-preview-name" id="file-name">-</div>
                        <div class="file-preview-size" id="file-size">-</div>
                    </div>
                    <button type="button" class="file-remove" onclick="removeFile()" title="Hapus file">✕</button>
                </div>

                @error('file')
                    <div class="field-error">⚠ {{ $message }}</div>
                @enderror
            </div>

            {{-- Catatan --}}
            <div class="field">
                <label for="notes">Catatan <span style="color:var(--text-soft);font-weight:400">(opsional)</span></label>
                <textarea
                    id="notes"
                    name="notes"
                    placeholder="Tulis keterangan tambahan jika diperlukan..."
                    class="{{ $errors->has('notes') ? 'is-invalid' : '' }}"
                >{{ old('notes') }}</textarea>
                @error('notes')
                    <div class="field-error">⚠ {{ $message }}</div>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="btn-row">
                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                    Kirim Pengajuan
                </button>
                <a href="{{ route('documents.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="info-card">
            <div class="info-card-title">
                <span>ℹ️</span> Syarat & Ketentuan
            </div>
            <div class="info-list">
                <div class="info-item">
                    <div class="info-dot">📎</div>
                    File harus dalam format PDF, DOC, atau DOCX.
                </div>
                <div class="info-item">
                    <div class="info-dot">📏</div>
                    Ukuran file maksimal <strong>5 MB</strong>.
                </div>
                <div class="info-item">
                    <div class="info-dot">✅</div>
                    Pastikan dokumen sudah ditandatangani sebelum diupload.
                </div>
                <div class="info-item">
                    <div class="info-dot">⏱️</div>
                    Proses persetujuan memakan waktu 1–3 hari kerja.
                </div>
            </div>
        </div>

        <div class="tip-card">
            <div class="tip-card-title">💡 Tips Pengajuan</div>
            <div class="tip-list">
                <div class="tip-item">Gunakan nama file yang jelas dan deskriptif.</div>
                <div class="tip-item">Pilih jenis dokumen yang sesuai dengan keperluan.</div>
                <div class="tip-item">Isi catatan jika ada informasi tambahan untuk admin.</div>
                <div class="tip-item">Pantau status di halaman Riwayat Dokumen.</div>
            </div>
        </div>
    </div>

</div>

<script>
    function handleFile(input) {
        const file = input.files[0];
        if (!file) return;
        showPreview(file);
    }

    function handleDrag(e, over) {
        e.preventDefault();
        document.getElementById('upload-area').classList.toggle('drag-over', over);
    }

    function handleDrop(e) {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (!file) return;
        document.getElementById('file-input').files = e.dataTransfer.files;
        showPreview(file);
        document.getElementById('upload-area').classList.remove('drag-over');
    }

    function showPreview(file) {
        const area    = document.getElementById('upload-area');
        const preview = document.getElementById('file-preview');
        const ph      = document.getElementById('upload-placeholder');

        document.getElementById('file-name').textContent = file.name;
        document.getElementById('file-size').textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';

        area.classList.add('has-file');
        ph.style.display   = 'none';
        preview.classList.add('show');
    }

    function removeFile() {
        document.getElementById('file-input').value = '';
        document.getElementById('upload-area').classList.remove('has-file');
        document.getElementById('upload-placeholder').style.display = 'block';
        document.getElementById('file-preview').classList.remove('show');
    }
</script>
</body>
</html>