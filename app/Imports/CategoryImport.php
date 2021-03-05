<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\{ToModel,WithHeadingRow};

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'title' => $row['categoria'],
            'description' => $row['descricao']
        ]);
    }
}
