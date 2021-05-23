<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    public function index(User $user){
        $query =  Reservation::with('plan');
        $query->where('user_id', \Auth::id());
        $reservations = $query->get();
        return view('auth.mypage', ['reservations' => $reservations]);
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
