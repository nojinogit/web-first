<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class BreakTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1,$j=new Carbon('2023-5-1 12:30:00'),$k=new Carbon('2023-5-1 13:30:00');$i<15;$i++,$j->addDay(),$k->addDay()){
        $param = [
        'working_hour_id' => $i,
        'break_start' => $j,
        'break_end' => $k,
        ];
        DB::table('break_times')->insert($param);}
    }
}
