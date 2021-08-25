<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        return view('dash.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        $data = $request->all();
        $user = User::find(Auth::user()->id);
        $user->update($data);

        return redirect()->route('dash.profile')->with('message',  'Dados pessoais alterados com sucesso!');

    }


    public function redefinePass(Request $request)
    {

        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $data = $request->all();
        $user = User::find(Auth::user()->id);

        $data['password'] = bcrypt($data['password']);
        
        $user->update($data);

        return redirect()->route('dash.profile')->with('message', 'Sua senha foi atualizada com sucesso!');
    }

}
