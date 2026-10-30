<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'pegawai') {
            $pengajuans = Pengajuan::where('user_id', $user->id)
                ->latest()
                ->get();

            $totalPengajuan = $pengajuans->count();

            $menunggu = $pengajuans->where('status', 'Menunggu')->count();

            $disetujui = $pengajuans->where('status', 'Disetujui')->count();

            $ditolak = $pengajuans->where('status', 'Ditolak')->count();

            return view('dashboard.pegawai', compact(
                'pengajuans',
                'totalPengajuan',
                'menunggu',
                'disetujui',
                'ditolak'
            ));
        }

        if ($user->role === 'atasan') {
            return view('dashboard.atasan');
        }

        if ($user->role === 'admin_aplikasi') {
            return view('dashboard.admin');
        }

        abort(403, 'Anda tidak memiliki akses.');
    }
}