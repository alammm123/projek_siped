<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
protected $fillable = [
        'user_id',
        'document_type_id',
        'file_path',
        'original_filename',
        'status',
        'notes',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jenis dokumen
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }}
