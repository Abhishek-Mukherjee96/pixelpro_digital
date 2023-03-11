<?php

namespace App\Exports;

use App\Models\EmployeeAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmployeeAttendance::all();
    }
}
