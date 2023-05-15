<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WorkingHour;
use App\Models\BreakTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*User::factory(10)->create();*/
        /*WorkingHour::factory(10)->create();*/
        BreakTime::factory(99)->create();
        /*$this->call(WorkinghoursTableSeeder::class);*/
        /*$this->call(BreakTimesTableSeeder::class);*/
    }
}
