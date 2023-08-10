<?php

namespace App\Http\Controllers;

use App\Models\Capkin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CapkinController extends Controller
{
    public function index()
    {
        $excelData = Capkin::all();;
        foreach ($excelData as $rowData) {
            $newDataCapkin[$rowData->id] = array(
                'Triwulan 1' => $rowData->tw1_capkin,
                'Triwulan 2' => $rowData->tw2_capkin,
                'Triwulan 3' => $rowData->tw3_capkin,
                'Triwulan 4' => $rowData->tw4_capkin
            );
            $newDataRA[$rowData->id] = array(
                'Triwulan 1' => $rowData->tw1_ra,
                'Triwulan 2' => $rowData->tw2_ra,
                'Triwulan 3' => $rowData->tw3_ra,
                'Triwulan 4' => $rowData->tw4_ra
            );
        }

        return view('dashboard.capaian-kinerja', ['newDataCapkin' => $newDataCapkin, 'newDataRA' => $newDataRA, 'excelData' => $excelData]);
    }
}
