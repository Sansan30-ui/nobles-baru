<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request, User $user)
    {
        if ($request->password != null) {
            $validated = $request->validate([
                'password' => 'required|string|min:8|confirmed',
                'konfirmasi_password' => 'required|string|min:8|same:password',
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
                'no_hp' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
            ]);
        }

        $data = $request->all();

        $user = User::findOrFail(Auth::user()->id);
        $user->update($data);
        return redirect('/profile');
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required|string|min:8',
            'password' => 'required|string|min:8|same:password',
            'konfirmasi_password' => 'required|string|min:8|same:password',
        ]);

        $user = User::FIndOrFail(Auth::user()->id);
        if (Hash::check($request->password_lama, $user->password)) {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            $user->update($data);
            return redirect('/profile')->with('status', 'password Berhasil disimpan');
        } else {

            return redirect('/profile')->with('error', 'password Lama Salah');
        }
    }
}
