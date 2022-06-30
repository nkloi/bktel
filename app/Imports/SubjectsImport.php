<?php

namespace App\Imports;

use App\Models\subjects;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectsImport implements WithHeadingRow,ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            
            $new_subjects = new subjects();

            $new_subjects->name = $row["name"];
            $new_subjects->subject_code = $row["subject_code"];
            $new_subjects->note = $row["note"];

            $new_subjects->save();

        }
    }
}
