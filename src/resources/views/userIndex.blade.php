@extends('layouts.layouts')

@section('title','userIndex')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">

@endsection

@section('content')

<h1>
    <form action="/userSearch" method="get">
        @csrf
        <input type="number" placeholder="ID" name="id">
        <input type="text" placeholder="名前検索" name="name">
        <input type="email" placeholder="メールアドレス" name="email">
        <button>検索</button>
    </form>
</h1>

<div class="attendance-table">
    <table class="attendance-table__inner">
    <tr class="attendance-table__row">
        <th class="attendance-table__header">ID</th>
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">メールアドレス</th>
    </tr>
    @isset($users)
    @foreach($users as $user)
    <tr class="attendance-table__row">
        <td class="attendance-table__item">{{$user->id}}</td>
        <td class="attendance-table__item">{{$user->name}}</td>
        <td class="attendance-table__item">{{$user->email}}</td>
    </tr>
    @endforeach
    @endisset
    </table>
</div>
@isset($users)
<div class="pagination_block">
{{ $users->appends(request()->query())->links() }}
</div>
@endisset
@endsection