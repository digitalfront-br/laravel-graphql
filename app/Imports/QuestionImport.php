<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class QuestionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'title' => $row['question'],
            'category_id' => $row['category_id'],
        ]);
    }
}
