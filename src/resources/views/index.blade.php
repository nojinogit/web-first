@extends('layouts.layouts')

@section('title','index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')

<h1>{{ Auth::user()->name }} さんお疲れ様です！</h1>
{{ \Carbon\Carbon::now() }}
@if(session('message'))
<div class="message">
    <div class="message__success">
        <p class="message__success--p" id="session">{{session('message')}}</p>
    </div>
</div>
@endif

<div class="attendance__content">
    <div class="attendance__panel">
        <form class="attendance__button" action="workingStart" method="post" id="working_start_form">
            @csrf
        <input type="hidden" name="sess" value="working_start">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="working_end" value="{{ \Carbon\Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(59) }}">
        <button class="attendance__button-submit" type="submit" id="working_start">勤務開始</button>
        </form>
        <form class="attendance__button" action="workingEnd" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <button class="attendance__button-submit button-none" type="submit" id="working_end" >勤務終了</button>
        </form>
    </div>
    <div class="attendance__panel">
        <form class="attendance__button" action="breakStart" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="break_end" value="{{ \Carbon\Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(59) }}">
        <button class="attendance__button-submit button-none" type="submit"  id="break_start" >休憩開始</button>
        </form>
        <form class="attendance__button"  action="breakEnd" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <button class="attendance__button-submit button-none" type="submit"  id="break_end" >休憩終了</button>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(function() {

    if($('#session').text()=='出勤しました'){
        $('#working_start').toggleClass('button-none');
        $('#working_end').toggleClass('button-none');
        $('#break_start').toggleClass('button-none');
    };

    if($('#session').text()=='退勤しました'){
        $('#working_start').removeClass('button-none');
        $('#working_end').addClass('button-none');
        $('#break_start').addClass('button-none');
    };

    if($('#session').text()=='休憩開始しました'){
        $('#working_start').addClass('button-none');
        $('#working_end').addClass('button-none');
        $('#break_start').addClass('button-none');
        $('#break_end').removeClass('button-none');
    };

    if($('#session').text()=='休憩終了しました'){
        $('#working_start').addClass('button-none');
        $('#working_end').removeClass('button-none');
        $('#break_start').removeClass('button-none');
        $('#break_end').addClass('button-none');
    };

});
</script>

@endsection