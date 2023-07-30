<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pusat extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    function capaianKinerja() {
        return $this->hasMany(CapaianKinerja::class, "id");
    }
}
