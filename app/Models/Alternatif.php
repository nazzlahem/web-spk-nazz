<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function subKriteria()
    // {
    //     return $this->belongsToMany(SubKriteria::class, 'alternatif_subkriteria')
    //     ->withPivot('nilai_sub_kriteria', 'deskripsi_alternatif')
    //     ->withTimestamps();
    // }
}
