<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokters';
    protected $guarded = [];


    public function poli()
    {
        return $this->belongsTo(PolY::class, 'id_poli');
    }

    public function bpjs()
    {
        return $this->hasMany(BPJS::class, 'selected_dokter_id');
    }
}
