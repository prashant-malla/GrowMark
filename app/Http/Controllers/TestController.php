<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function greeting()
    {
        $name = null;
        $greeting = 'Hello, ';
        $users = User::get();
        return view('greeting')->with(['name' => $name, 'greeting' => $greeting]);
    }
}
