<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class WorkinghoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=new Carbon('2023-5-1 08:30:00'),$j=new Carbon('2023-5-1 17:30:00');$i<new Carbon('2023-5-11 08:30:00');$i->addDay(),$j->addDay()){
        $param = [
        'user_id' => '1',
        'working_start' => $i,
        'working_end' => $j,
        ];
        DB::table('working_hours')->insert($param);}

}
}
