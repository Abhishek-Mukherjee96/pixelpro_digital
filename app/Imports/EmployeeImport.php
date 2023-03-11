<?php

namespace App\Imports;

use App\Models\EmployeeAttendance;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeAttendance([
            'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0])->format('Y-m-d'),
            'user_id' => $row['1'],
            'device_code' => $row['2'],
            'employee_name' => $row['3'],
            'company' => $row['4'],
            'department' => $row['5'],
            'category' => $row['6'],
            'designation' => $row['7'],
            'grade' => $row['8'],
            'team' => $row['9'],
            'shift' => $row['10'],
            'in_time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11])->format('H:i A'),
            'out_time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12])->format('H:i A'),
            'duration' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13])->format('H:i A'),
            'late_by' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[14])->format('H:i A'),
            'early_by' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[15])->format('H:i A'),
            'status' => $row['16'],
            'punch_records  ' => $row['17'],
            'overtime' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[18])->format('H:i A'),
        ]);
    }
}
