<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AjoutController extends Controller
{
    public function afficherFormulaire(){
        return view('inscription.ajout');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password' =>[
                'required',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>]+$/'
            ],
            'role'=>'required|unique:users',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email=$validatedData['email'];
        $user->password=Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];

        $user->save();

        return redirect('/dashboard/dsic')->with('success','Ajout reussi');

    }

    /*public function index(){
        $totalUsers = User::count();
        return view('dashboard.dsic',compact('totalUsers'));
    }*/
}
