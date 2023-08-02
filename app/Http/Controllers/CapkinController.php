<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapkinController extends Controller
{
    public function index() {
        return view('dashboard.capaian-kinerja');
    }

}
