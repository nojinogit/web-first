@extends('layouts.layouts')

@section('title','userAttendance')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">

@endsection

@section('content')

<div class="search">
    <form action="/userAttendanceSearch" method="get">
        @csrf
        <div class="search-input">
            <input type="number" placeholder="ID" name="id" class="input-top" value = "{{ old('id') }}">
            <input type="text" placeholder="名前検索" name="name" class="input-top" value = "{{ old('name') }}">
        </div>
        <div class="search-input">
            <input type="date" name="startDate" value = "{{ old('startDate') }}">
            <div class="to">～</div>
            <input type="date" name="endDate" value = "{{ old('endDate') }}">
        </div>
        <button>検索</button>
    </form>
</div>

<div class="attendance-table">
    <table class="attendance-table__inner">
    <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">勤務日</th>
        <th class="attendance-table__header">勤務開始</th>
        <th class="attendance-table__header">勤務終了</th>
        <th class="attendance-table__header">休憩時間</th>
        <th class="attendance-table__header" nowrap>勤務時間</th>
    </tr>
    @isset($userAttendances)
    @foreach($userAttendances as $userAttendance)
    <tr class="attendance-table__row">
        <td class="attendance-table__item">{{$userAttendance->user->name}}</td>
        <td class="attendance-table__item">
            @php
                $working_start=\Carbon\Carbon::parse($userAttendance->working_start);
                $working_start_day=$working_start->format('y-m-d');
            @endphp
            {{$working_start_day}}
        </td>
        <td class="attendance-table__item">
            @php
                $working_start=\Carbon\Carbon::parse($userAttendance->working_start);
                $working_start_time=$working_start->format('H:i:s');
            @endphp
            {{$working_start_time}}
        </td>
        <td class="attendance-table__item">
            @php
                $working_end=\Carbon\Carbon::parse($userAttendance->working_end);
                $working_end_time=$working_end->format('H:i:s');
            @endphp
            {{$working_end_time}}
        </td>
        <td class="attendance-table__item">
            @php
                $totalbreak=0;
                foreach($userAttendance->breaktimes as $userAttendance->breaktime){
                        $break_start=\Carbon\Carbon::parse($userAttendance->breaktime->break_start);
                        $break_end=\Carbon\Carbon::parse($userAttendance->breaktime->break_end);
                        $onebreak=$break_start->diffInSeconds($break_end);
                        $totalbreak+=$onebreak;}
                $breaktime=gmdate('H:i:s',$totalbreak);
            @endphp
            {{$breaktime}}
        </td>
        <td class="attendance-table__item">
            @php
                $totaltime=$working_start->diffInSeconds($working_end);
                $workingtime=$totaltime-$totalbreak;
                $formatWorkingTime=gmdate('H:i:s',$workingtime);
            @endphp
            {{$formatWorkingTime}}
        </td>
    </tr>
    @endforeach
    @endisset
    </table>
</div>
@isset($userAttendances)
<div class="pagination_block">
{{ $userAttendances->appends(request()->query())->links('') }}
</div>
@endisset
@endsection