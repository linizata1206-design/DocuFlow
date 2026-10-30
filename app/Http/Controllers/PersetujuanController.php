<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::where('status', 'Menunggu')
            ->latest()
            ->get();

        return view('persetujuan.index', compact('pengajuans'));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        $pengajuan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('persetujuan.index')
            ->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}