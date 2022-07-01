<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use App\Models\Student;
use App\models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersStudentsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            Student::create([
               'last_name'  => $row["last_name"],
               'first_name'  => $row["first_name"],
               'student_code' => $row["student_code"],
               'department'=> $row["department"],
               'faculty'=> $row["faculty"],
               'address'=> $row["address"],
               'phone'=> $row["phone"],
               'note'=> $row["note"],
            ]);
            User::create([
                'name'=>$row["last_name"],
                'email'=> $row["email"],
                'password'=>Hash::make("Bmvt@hcmut"),
            ]);
        
        }
    }
}
