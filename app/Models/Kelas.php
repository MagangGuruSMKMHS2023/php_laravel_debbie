<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kelas';
    protected $table = "kelas";
    protected $fillable = [
        'id_kelas',
        'namakelas',
        'walikelas',
        'ketuakelas',
        'kursi',
        'meja',
        'gambar_kelas',
        "update_at",
        "created_at"
    ];
}