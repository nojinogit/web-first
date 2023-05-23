@extends('layouts.layouts')

@section('title','attendance')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">

@endsection

@section('content')

<h1>
    <form action="/search" method="get">
        @csrf
        <input type="date" value="{{ date('Y-m-d'); }}" name="date" class="search-input">
        <button>検索</button>
    </form>
</h1>

<div class="attendance-table">
    <table class="attendance-table__inner">
    <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">勤務開始</th>
        <th class="attendance-table__header">勤務終了</th>
        <th class="attendance-table__header">休憩時間</th>
        <th class="attendance-table__header">勤務時間</th>
    </tr>
    @isset($attendances)
    @foreach($attendances as $attendance)
    <tr class="attendance-table__row">
        <td class="attendance-table__item">{{$attendance->user->name}}</td>
        <td class="attendance-table__item">
            @php
                $working_start=\Carbon\Carbon::parse($attendance->working_start);
                $working_start_time=$working_start->format('H:i:s');
            @endphp
            {{$working_start_time}}
        </td>
        <td class="attendance-table__item">
            @php
                $working_end=\Carbon\Carbon::parse($attendance->working_end);
                $working_end_time=$working_end->format('H:i:s');
            @endphp
            {{$working_end_time}}
        </td>
        <td class="attendance-table__item">
            @php
                $totalbreak=0;
                foreach($attendance->breaktimes as $attendance->breaktime){
                        $break_start=\Carbon\Carbon::parse($attendance->breaktime->break_start);
                        $break_end=\Carbon\Carbon::parse($attendance->breaktime->break_end);
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
@isset($attendances)
<div class="pagination_block">
{{ $attendances->appends(request()->query())->links('vendor/pagination/bootstrap-4') }}
</div>
@endisset
@endsection