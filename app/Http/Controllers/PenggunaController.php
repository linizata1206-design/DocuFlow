<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $penggunas = User::latest()->get();

        return view('pengguna.index', compact('penggunas'));
    }

    // Menambahkan akun pengguna oleh Admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => [
                'required',
                Rule::in(['pegawai', 'atasan', 'admin_aplikasi']),
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('pengguna.index')
            ->with('success', 'Akun pengguna berhasil ditambahkan.');
    }

    // Mengubah role pengguna
    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => [
                'required',
                Rule::in(['pegawai', 'atasan', 'admin_aplikasi']),
            ],
        ]);

        // Akun yang sedang digunakan tidak boleh mengubah role sendiri.
        if ($user->id === $request->user()->id) {
            return back()->with(
                'error',
                'Kamu tidak dapat mengubah role akun sendiri.'
            );
        }

        // Lindungi akun Admin Aplikasi dari perubahan role.
        if ($user->role === 'admin_aplikasi') {
            return back()->with(
                'error',
                'Role akun Admin Aplikasi tidak dapat diubah melalui fitur ini.'
            );
        }

        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('pengguna.index')
            ->with('success', 'Role pengguna berhasil diperbarui.');
    }

    // Menghapus akun pengguna
    public function destroy(User $user)
    {
        // Akun yang sedang digunakan tidak boleh menghapus dirinya sendiri.
        if ($user->id === auth()->id()) {
            return back()->with(
                'error',
                'Kamu tidak dapat menghapus akun sendiri.'
            );
        }

        // Lindungi akun Admin Aplikasi dari penghapusan melalui fitur ini.
        if ($user->role === 'admin_aplikasi') {
            return back()->with(
                'error',
                'Akun Admin Aplikasi tidak dapat dihapus melalui fitur ini.'
            );
        }

        $user->delete();

        return redirect()->route('pengguna.index')
            ->with('success', 'Akun pengguna berhasil dihapus.');
    }
}