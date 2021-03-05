<?php

namespace Database\Seeders;

use App\Models\PersonValue;
use Illuminate\Database\Seeder;

class PersonValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonValue::factory()->make();
    }
}
