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
            'image' => ('https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $row['title']).'&size=100&color=7F9CF5&background=DBF4FF'),
            'description' => $row['description']
        ]);
    }
}
