<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    // Relasi: satu jenis dokumen punya banyak dokumen
    public function documents()
    {
        return $this->hasMany(DocumentType::class);
    }

    // Scope: hanya yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
