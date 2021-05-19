<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{    
    public function edit(User $user) {
        return view('user');
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect(route('/', $user));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/');
    }
}
