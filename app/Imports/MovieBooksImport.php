<?php

namespace App\Imports;

use App\Models\MovieBook;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class MovieBooksImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MovieBook([
            'title' => $row['title'],
            'type' => $row['type'],
            'description' => $row['description']
        ]);
    }
}
