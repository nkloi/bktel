<?php

namespace App\Imports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            
            $new_students = new students();

            $new_students->last_name = $row["last_name"];
            $new_students->first_name = $row["first_name"];
            $new_students->student_code = $row["student_code"];
            $new_students->department = $row["department"];
            $new_students->faculty = $row["faculty"];
            $new_students->address = $row["address"];
            $new_students->phone = $row["phone"];
            $new_students->note = $row["note"];
            $new_students->save();

            $new_users = new User();

            $new_users->name = $row["last_name"].$row["first_name"];
            $new_users->email = $row["email"];
            $new_users->password = Hash::make($row["password"]);
            $new_users->role_id = 4;
            $new_students->studentid()->save($new_users);


        }
    }
}
