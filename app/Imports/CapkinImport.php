<?php

namespace App\Imports;

use App\Models\Capkin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class CapkinImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Capkin([
            'tw1_capkin' => $row['tw1_capkin'],
            'tw1_ra' => $row['tw1_ra'],
            'tw2_capkin' => $row['tw2_capkin'],
            'tw2_ra' => $row['tw2_ra'],
            'tw3_capkin' => $row['tw3_capkin'],
            'tw3_ra' => $row['tw3_ra'],
            'tw4_capkin' => $row['tw4_capkin'],
            'tw4_ra' => $row['tw4_ra']
        ]);
    }
}
