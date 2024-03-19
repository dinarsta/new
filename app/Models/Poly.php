<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    use HasFactory;
    protected $table = 'polies';
    protected $guarded = [];

    public function dokters()
    {
        return $this->hasMany(Dokter::class);
    }

    public function bpjs()
    {
        return $this->hasMany(BPJS::class, 'selected_poli_id');
    }
}
