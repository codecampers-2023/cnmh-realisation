<?php

namespace App\Imports;

use App\Models\type_handicap;
use Maatwebsite\Excel\Concerns\ToModel;

class importTypeHandicap implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    // dd($row);
        return new type_handicap([
            'nom'=> $row[0],
            'description'  => $row[1],
        ]);
    }

}
