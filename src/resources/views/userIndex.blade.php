@extends('layouts.layouts')

@section('title','userIndex')

@section('css')
<link rel="stylesheet" href="{{ asset('css/userIndex.css')}}">

@endsection

@section('content')

<h1>
    <form action="/userSearch" method="get">
        @csrf
        <input type="number" placeholder="ID" name="id" class="search-input">
        <input type="text" placeholder="名前検索" name="name" class="search-input">
        <input type="email" placeholder="メールアドレス" name="email" class="search-input">
        <button>検索</button>
    </form>
</h1>

<div class="userindex-table">
    <table class="userindex-table__inner">
    <tr class="userindex-table__row">
        <th class="userindex-table__header">ID</th>
        <th class="userindex-table__header">名前</th>
        <th class="userindex-table__header">メールアドレス</th>
    </tr>
    @isset($users)
    @foreach($users as $user)
    <tr class="userindex-table__row">
        <td class="userindex-table__item">{{$user->id}}</td>
        <td class="userindex-table__item">{{$user->name}}</td>
        <td class="userindex-table__item">{{$user->email}}</td>
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