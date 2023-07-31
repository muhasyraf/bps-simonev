<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerjanjianKinerja extends Model
{
    use HasFactory;

    public $table = "perjanjian_kinerjas";


    protected $fillable = [
        'pusat_id',
        'tanggal',
        'tahun',
        'review',
        'link'
    ];

    public function pusat() {
        return $this->belongsTo(Pusat::class);
    }

}
