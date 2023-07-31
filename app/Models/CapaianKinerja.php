<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianKinerja extends Model
{
    use HasFactory;

    public $table = "capaian_kinerjas";

    protected $fillable = [
        'pusat_id',
        'tanggal',
        'tahun',
        'triwulan',
        'file'
    ];

    public function pusat() {
        return $this->belongsTo(Pusat::class);
    }
}
