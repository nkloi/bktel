<?php

namespace App\Imports;

use App\Models\teachers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeachersImport implements WithHeadingRow, ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */



    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            
            teachers::create([

                'last_name' => $row["last_name"],
                'first_name' => $row["first_name"],
                'teacher_code' => $row["teacher_code"],
                'department' => $row["department"],
                'faculty' => $row["faculty"],
                'address' => $row["address"],
                'phone' => $row["phone"],
                'note' => $row["note"],

            ]);

            // $lastId = teachers::max('id');

            // User::create([

            //     'name' => $row["last_name"] . $row["first_name"],
            //     'email' => $row['email'],
            //     'password' => Hash::make($row['default_password']),
            //     'role_id' => 3,
            //     'teacher_id' => $lastId,

            // ]);

            // $user_id = User::max('id');

            // User::where('id', $user_id)->update(['teacher_id' => $lastId]);

        }
    }
}
