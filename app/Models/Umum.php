<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
    use HasFactory;
    protected $table = 'bpjs';
    protected $fillable = ['no_bpjs', 'norm', 'nik_ktp', 'nama', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'selected_poly_id', 'selected_dokter_id'];

}
