<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class UserController extends Controller
{   public function index(Request $request, User $user){
    if ($request->id) {
        echo $request->id;
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

        if (\Auth::user()->is_admin == 1) {
            // // 管理者でログインしている場合
            if (url()->previous() == 'http://localhost:8000/users') {
                // 会員詳細画面
                $user = User::where('id', $user->id)->get();
                return view('users.show', ['user' => $user]);
            } else {
                $reservations = [];
                return view('auth.mypage', ['reservations' => $reservations]);
            }
        } else {
            // 一般ユーザーでログインしている場合
            return view('auth.mypage', ['reservations' => $reservations]);
        }        
    }
    public function edit(User $user) {
        return view('auth.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect(route('users.index'));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/');
    }
}
