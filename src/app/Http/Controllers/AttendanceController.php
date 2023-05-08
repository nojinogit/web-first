<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkingHour;
use App\Models\BreakTime;

class AttendanceController extends Controller
{
    public function attendance(){
        return view('/attendance');
    }

    public function search(Request $request){
        $attendances=WorkingHour::with('breaktimes','user')->whereDate('working_start',$request->date)->get();
        return view('/attendance',compact('attendances'));
    }
}
