<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // ─────────────────────────────────────────
    //  TAMPILKAN PROFIL
    // ─────────────────────────────────────────

    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // ─────────────────────────────────────────
    //  UPDATE DATA PROFIL
    // ─────────────────────────────────────────

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'nullable|string|max:20',
            'nim'      => 'nullable|string|max:20',
            'jurusan'  => 'nullable|string|max:100',
            'angkatan' => 'nullable|string|max:10',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max'      => 'Nama maksimal 255 karakter.',
            'phone.max'     => 'Nomor HP maksimal 20 karakter.',
        ]);

        $user->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'nim'      => $request->nim,
            'jurusan'  => $request->jurusan,
            'angkatan' => $request->angkatan,
        ]);

        return back()->with('status_profile', 'Data profil berhasil diperbarui!');
    }

    // ─────────────────────────────────────────
    //  UPDATE PASSWORD
    // ─────────────────────────────────────────

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password'      => 'required|string',
            'password'              => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'password.required'         => 'Password baru wajib diisi.',
            'password.min'              => 'Password baru minimal 8 karakter.',
            'password.confirmed'        => 'Konfirmasi password tidak cocok.',
        ]);

        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama yang kamu masukkan salah.',
            ])->with('tab', 'password');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status_password', 'Password berhasil diubah!');
    }

    // ─────────────────────────────────────────
    //  UPDATE AVATAR
    // ─────────────────────────────────────────

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'avatar.required' => 'Pilih foto terlebih dahulu.',
            'avatar.image'    => 'File harus berupa gambar.',
            'avatar.mimes'    => 'Format foto harus JPG atau PNG.',
            'avatar.max'      => 'Ukuran foto maksimal 2 MB.',
        ]);

        $user = Auth::user();

        // Hapus avatar lama jika ada
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Simpan avatar baru
        $path = $request->file('avatar')->store('avatars', 'public');

        $user->update(['avatar' => $path]);

        return back()->with('status_profile', 'Foto profil berhasil diperbarui!');
    }
}