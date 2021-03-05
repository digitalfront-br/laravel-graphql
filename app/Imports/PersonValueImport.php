<?php

namespace App\Imports;

use App\Models\PersonValue;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class PersonValueImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PersonValue([
            'title' => $row['valores']
        ]);
    }
}
