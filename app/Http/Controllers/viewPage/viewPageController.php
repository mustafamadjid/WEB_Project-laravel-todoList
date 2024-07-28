<?php

namespace App\Http\Controllers\viewPage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class viewPageController extends Controller
{
    public function viewHome(){
        return view("todo.home");
    }

    public function viewAboutUs(){
        return view("todo.aboutUs");
    }

    public function viewUser(){
        $users = User::select('id','name', 'email')->get();

        return view("todo.account",compact("users"));
    }
}
