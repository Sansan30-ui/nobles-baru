<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
