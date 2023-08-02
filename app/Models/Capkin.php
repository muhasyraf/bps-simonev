<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capkin extends Model
{
    use HasFactory;

    public $table = "capkins";

    protected $fillable = [
        'tw1_capkin',
        'tw1_ra',
        'tw2_capkin',
        'tw2_ra',
        'tw3_capkin',
        'tw3_ra',
        'tw4_capkin',
        'tw4_ra',
        'file'
    ];

}
