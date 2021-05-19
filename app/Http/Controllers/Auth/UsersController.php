<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        // 管理者による会員検索（会員IDで検索）
        $user = User::where('id', '==', $request->id)->get();
        return view('/', ['user' => $user]);
    }
}



