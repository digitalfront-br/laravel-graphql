<?php

namespace Database\Seeders;

use App\Models\MovieBook;
use Illuminate\Database\Seeder;

class MovieBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieBook::factory()->make();
    }
}
