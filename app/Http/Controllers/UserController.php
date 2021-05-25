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
    
    
    public function show($id) {
        echo $id;
        $date = date("Y-m-d");
        $query = Reservation::with('plan');
        $query->where('check_in', '>=', $date);
        $query->where('user_id', \Auth::id());
        $reservations = $query->get();

        if ($id == \Auth::id()) {
            return view('auth.mypage', ['reservations' => $reservations]);
        } else {
            $user = User::where('id', $id);
            return view('users.show', ['user' => $user, 'id' => $id]);
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
