<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class UserController extends Controller
{   public function index(Request $request, User $user){
    if ($request->id) {
        $users = User::where('id', $request->id)->get();
    } else {
        $users = User::all();
    }
    return view('users.index', ['users' => $users]);
}
    
    
    public function show(User $user) {
        $date = date("Y-m-d");
        $query = Reservation::with('plan');
        $query->where('check_in', '>=', $date);
        $query->where('user_id', \Auth::id());
        $reservations = $query->get();

        $url = mb_strstr(url()->previous(), '?', true) ? mb_strstr(url()->previous(), '?', true) : url()->previous();

            if ($url == 'http://localhost:8000/users') {
                // 会員詳細画面
                if ($user->id == \Auth::user()->id) {
                    // １つ前にいた画面がユーザー一覧画面で、かつ「マイページ」ボタンを押した場合
                    return view('auth.mypage', ['reservations' => $reservations]);
                } else {
                    // １つ前にいた画面がユーザー一覧画面で、かつユーザー検索結果一覧のIDボタンを押した場合
                    return view('users.show', ['user' => $user]);
                }
            } else {
                $reservations = [];
                return view('auth.mypage', ['reservations' => $reservations]);
            }
    }
    public function edit(User $user) {
        return view('auth.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:200',
            'tel' => 'required|numeric|digits_between:8,11',
            'email' => 'required|email|max:50|unique:users',
            'birthday' => 'required',
            'password' => 'required|min:8|confirmed',
            ]);
        $user->update($request->all());
        return redirect(route('users.index'));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/');
    }
}
