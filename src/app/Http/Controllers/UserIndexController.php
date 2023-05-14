<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserIndexController extends Controller
{
    public function index(){
        return view('/userIndex');
    }

    public function search(Request $request){
        $users=User::IdSearch($request->id)->NameSearch($request->name)->EmailSearch($request->email)->Paginate(5);
        return view('/userIndex',compact('users'));
    }
}
