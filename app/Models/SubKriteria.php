<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Define relationship to Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
