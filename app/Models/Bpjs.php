<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpjs extends Model
{
    use HasFactory;

    protected $table = 'bpjs';
    protected $fillable = ['no_bpjs', 'norm', 'nik_ktp', 'nama', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'selected_poly_id', 'selected_dokter_id'];

  public function poli()
  {
      return $this->belongsTo(Poly::class, 'selected_poli_id');
  }

  public function dokter()
  {
      return $this->belongsTo(Dokter::class, 'selected_dokter_id');
  }
}
