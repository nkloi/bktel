<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use App\Models\Subject;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersSubjectsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            Subject::create([
               'name'  => $row["name"],
               'code' => $row["code"],
               'note'=> $row["note"],
            ]);
            
        
        }
    }
}
