<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) {
        // 管理者による会員検索（会員IDで検索）
        if (isset($request->id)) {
            $users = User::where('id', '==', $request->id)->get();
        } else {
            $users = User::all();
        }
        return view('/', ['users' => $users]);
    }
}



