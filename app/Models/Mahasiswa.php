<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    
    protected $table = 'mahasiwa';

    protected $fillable = ['nama', 'tanggal_lahir', 'npm', 'prodi', 'jenis_kelamin', 'alamat'];

}
