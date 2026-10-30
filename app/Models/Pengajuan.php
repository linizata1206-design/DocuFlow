<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'deskripsi',
        'lampiran',
        'status',
    ];
}
