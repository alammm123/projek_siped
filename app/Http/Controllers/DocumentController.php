<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Tampilkan form pengajuan dokumen.
     */
    public function create()
    {
        $documentTypes = DocumentType::active()->get();

        return view('documents.create', compact('documentTypes'));
    }

    /**
     * Simpan dokumen yang diajukan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'file'             => 'required|file|mimes:pdf,doc,docx|max:5120', // max 5MB
            'notes'            => 'nullable|string|max:500',
        ], [
            'document_type_id.required' => 'Jenis dokumen wajib dipilih.',
            'document_type_id.exists'   => 'Jenis dokumen tidak valid.',
            'file.required'             => 'File dokumen wajib diupload.',
            'file.mimes'                => 'Format file harus PDF, DOC, atau DOCX.',
            'file.max'                  => 'Ukuran file maksimal 5MB.',
        ]);

        // Simpan file ke storage
        $file          = $request->file('file');
        $originalName  = $file->getClientOriginalName();
        $filePath      = $file->store('documents', 'local');

        // Simpan ke database
        Document::create([
            'user_id'          => Auth::id(),
            'document_type_id' => $request->document_type_id,
            'file_path'        => $filePath,
            'original_filename'=> $originalName,
            'notes'            => $request->notes,
        ]);

        return redirect()->route('documents.index')
            ->with('status', 'Dokumen berhasil diajukan! Menunggu persetujuan.');
    }

    /**
     * Tampilkan riwayat pengajuan milik user yang login.
     */
    public function index()
    {
        $documents = Document::with('documentType')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('documents.index', compact('documents'));
    }

    /**
     * Download file dokumen.
     */
    public function download(Document $document)
    {
        // Pastikan hanya pemilik yang bisa download
        abort_if($document->user_id !== Auth::id(), 403);

                return Storage::disk('local')->download(
            $document->file_path, 
            $document->original_filename
        );
    }
    public function show(Document $document)
{
    abort_if($document->user_id !== Auth::id(), 403);
    $document->load('documentType');
    return view('documents.show', compact('document'));
}
}
