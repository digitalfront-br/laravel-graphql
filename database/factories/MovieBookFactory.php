<?php

namespace Database\Factories;

use App\Imports\MovieBooksImport;
use App\Models\MovieBook;
use Illuminate\Database\Eloquent\Factories\Factory;
use Maatwebsite\Excel\Facades\Excel;

class MovieBookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Excel::import(new MovieBooksImport, storage_path('sheets/filmes-livros.xls'));
        return [];
    }
}
