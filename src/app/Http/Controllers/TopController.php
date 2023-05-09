<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\BreakTime;
use \Carbon\Carbon;

class TopController extends Controller
{
    public function index(){
        return view('/index');
    }

    public function workingStart(Request $request){
        $working_start=$request->all();
        $working_start['working_start']=Carbon::now();
        WorkingHour::create($working_start);
        return redirect('/')->with('message','出勤しました');
    }

    public function workingEnd(Request $request){
        WorkingHour::where('user_id',$request->user_id)->latest()->first()->update(['working_end'=>Carbon::now()]);
        return redirect('/',)->with('message','退勤しました');
    }

    public function breakStart(Request $request){
        $break_start=$request->only(['break_end']);
        $break_start['break_start']=Carbon::now();
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->latest()->first();
        $break_start['working_hour_id']=$workingHoursID['id'];
        BreakTime::create($break_start);
        return redirect('/')->with('message','休憩開始しました');
    }

    public function breakEnd(Request $request){
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->first();
        BreakTime::where('working_hour_id',$workingHoursID['id'])->latest()->first()->update(['break_end'=>Carbon::now()]);
        return redirect('/')->with('message','休憩終了しました');
    }
}
