<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use app\models\user;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
