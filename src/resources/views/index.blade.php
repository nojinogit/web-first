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
        <p class="message__success--p">{{session('message')}}</p>
    </div>
</div>
@endif

<div class="attendance__content">
    <div class="attendance__panel">
        <form class="attendance__button" action="workingStart" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="working_end" value="{{ \Carbon\Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(59) }}">
        <button class="attendance__button-submit" type="submit">勤務開始</button>
        </form>
        <form class="attendance__button" action="workingEnd" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <button class="attendance__button-submit" type="submit">勤務終了</button>
        </form>
    </div>
    <div class="attendance__panel">
        <form class="attendance__button" action="breakStart" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="break_end" value="{{ \Carbon\Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(59) }}">
        <button class="attendance__button-submit" type="submit">休憩開始</button>
        </form>
        <form class="attendance__button"  action="breakEnd" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <button class="attendance__button-submit" type="submit">休憩終了</button>
        </form>
    </div>
</div>

@endsection