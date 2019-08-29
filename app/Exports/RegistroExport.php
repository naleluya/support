<?php

namespace App\Exports;

use DB;

use App\Technician;
use App\Secretarie;
use App\Direction;
use App\Unit;
use App\Support;
Use App\Support_detail;
use App\Asset;
use App\Categorie;

use Maatwebsite\Excel\Concerns\FromCollection;

class RegistroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Support::all();
    }
}
