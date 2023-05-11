<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingHour;
use App\Models\BreakTime;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index(Request $request){
    $message = session('message');
    /*$message = $request->session()->all();*/
    $unfinished_date=WorkingHour::where('user_id',Auth::user()->id)->whereNull('working_end')->first('id');
    if($unfinished_date!=null){
        session(['message'=>'出勤しました']);
    }
    return view('/index',['message' => $message]);
    }

    public function workingStart(Request $request){
        $working_start=$request->all();
        $working_start['working_start']=Carbon::now();
        WorkingHour::create($working_start);
        session(['message'=>'出勤しました']);
        $request->session()->put('user_id',$request->user_id);
        return redirect('/');
    }

    public function workingEnd(Request $request){
        WorkingHour::where('user_id',$request->user_id)->latest()->first()->update(['working_end'=>Carbon::now()]);
        session(['message'=>'退勤しました']);
        return redirect('/');
    }

    public function breakStart(Request $request){
        $break_start=$request->only(['break_end']);
        $break_start['break_start']=Carbon::now();
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->latest()->first();
        $break_start['working_hour_id']=$workingHoursID['id'];
        BreakTime::create($break_start);
        session(['message'=>'休憩開始しました']);
        return redirect('/');
    }

    public function breakEnd(Request $request){
        $workingHoursID=WorkingHour::where('user_id',$request->user_id)->whereDate('working_start',Carbon::today())->latest()->first();
        BreakTime::where('working_hour_id',$workingHoursID['id'])->latest()->first()->update(['break_end'=>Carbon::now()]);
        session(['message'=>'休憩終了しました']);
        return redirect('/');
    }
}
