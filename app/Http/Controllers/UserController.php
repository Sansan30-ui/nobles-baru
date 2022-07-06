<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.admin.account.akun', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
        // dd($id);
    }

    public function edit(User $user)
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('pages.user.profile', compact('user'));
    }

    public function update(User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $user->where('id', $user->id)->update($rules);
        return redirect('/home');
    }
}
