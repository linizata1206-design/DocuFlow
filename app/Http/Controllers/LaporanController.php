<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

class LaporanController extends Controller
{
    public function index()
    {
        $totalPengajuan = Pengajuan::count();

        $menunggu = Pengajuan::where('status', 'Menunggu')->count();

        $disetujui = Pengajuan::where('status', 'Disetujui')->count();

        $ditolak = Pengajuan::where('status', 'Ditolak')->count();

        return view('laporan.index', compact(
            'totalPengajuan',
            'menunggu',
            'disetujui',
            'ditolak'
        ));
    }
}