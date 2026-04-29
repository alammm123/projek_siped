<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Surat Observasi',     'description' => 'Surat izin observasi ke instansi'],
            ['name' => 'Proposal Penelitian', 'description' => 'Proposal skripsi atau penelitian'],
            ['name' => 'Surat Keterangan',    'description' => 'Surat keterangan aktif kuliah'],
        ];

        foreach ($types as $type) {
            DocumentType::create($type);
        }
    }
}
