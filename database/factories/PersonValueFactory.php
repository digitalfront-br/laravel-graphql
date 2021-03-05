<?php

namespace Database\Factories;

use App\Imports\PersonValueImport;
use App\Models\PersonValue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Maatwebsite\Excel\Facades\Excel;

class PersonValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Excel::import(new PersonValueImport, storage_path('sheets/valores.xls'));
        return [];
    }
}
