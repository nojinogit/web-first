<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkingHour;
use App\Models\BreakTime;

class UserAttendanceController extends Controller
{
    public function index(){
        return view('/userAttendance');
    }

    public function search(Request $request){
        $userAttendances=WorkingHour::with('user','breaktimes')->IdSearch($request->id)->NameSearch($request->name)->StartDateSearch($request->startDate)->EndDateSearch($request->endDate)->Paginate(5);
        return view('/userAttendance',compact('userAttendances'));
    }
}
