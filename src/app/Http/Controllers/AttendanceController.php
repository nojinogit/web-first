<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use Illuminate\Pagination\Paginator;

class AttendanceController extends Controller
{
    public function attendance(){
        return view('/attendance');
    }

    public function search(Request $request){
        $attendances=WorkingHour::with('breaktimes','user')->whereDate('working_start',$request->date)->Paginate(5);
        return view('/attendance',compact('attendances'));
    }
}
