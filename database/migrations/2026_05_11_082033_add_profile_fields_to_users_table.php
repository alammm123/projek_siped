<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable()->after('email');
        $table->string('nim')->nullable()->after('phone');       // NIM mahasiswa
        $table->string('jurusan')->nullable()->after('nim');
        $table->string('angkatan')->nullable()->after('jurusan');
        $table->enum('role', ['mahasiswa', 'admin'])->default('mahasiswa')->after('angkatan');
        $table->string('avatar')->nullable()->after('role');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['phone','nim','jurusan','angkatan','role','avatar']);
    });
    }
};
