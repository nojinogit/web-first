<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\BreakTime;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request){
    $message = session('message');
    $unfinished_working_date=WorkingHour::where('user_id',Auth::user()->id)->whereNull('working_end')->first('id');
    $unfinished_break_date=null;
    if($unfinished_working_date!=null){
    $unfinished_break_date=BreakTime::where('working_hour_id',$unfinished_working_date->id)->whereNull('break_end')->first('id');}

    if($unfinished_working_date!=null&&$unfinished_break_date==null){
        session(['message'=>'出勤中']);
    }
    elseif($unfinished_break_date!=null){
        session(['message'=>'休憩中']);
    }
    return view('/index',['message' => $message]);
    }

    public function workingStart(Request $request){
        $working_start=$request->all();
        $working_start['working_start']=Carbon::now();
        WorkingHour::create($working_start);
        $request->session()->put('user_id',$request->user_id);
        return redirect('/');
    }

    public function workingEnd(Request $request){
        WorkingHour::where('user_id',$request->user_id)->latest()->first()->update(['working_end'=>Carbon::now()]);
        session(['message'=>'お疲れさまでした！']);
        return redirect('/');
    }

    public function breakStart(Request $request){
        $break_start=$request->only(['break_end']);
        $break_start['break_start']=Carbon::now();
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->latest()->first();
        $break_start['working_hour_id']=$workingHoursID['id'];
        BreakTime::create($break_start);
        return redirect('/');
    }

    public function breakEnd(Request $request){
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->latest()->first();
        BreakTime::where('working_hour_id',$workingHoursID['id'])->latest()->first()->update(['break_end'=>Carbon::now()]);
        return redirect('/');
    }
}
