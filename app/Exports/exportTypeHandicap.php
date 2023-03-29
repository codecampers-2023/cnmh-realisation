<?php

namespace App\Exports;

use App\Models\type_handicap;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportTypeHandicap implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return type_handicap::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

}
