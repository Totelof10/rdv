<?php

namespace App\Http\Controllers;

//use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ConnexionController extends Controller
{
    public function afficherFormulaire()
    {
        return view('connexion.login');
    }

    public function connexion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case 'DG':
                    return redirect()->route('dashboard.dg');
                    break;
                case 'SP':
                    return redirect()->route('dashboard.sp');
                    break;
                case 'DSIC':
                    return redirect()->route('dashboard.dsic');
                    break;
                default:
                    // Rediriger vers une page par défaut si le rôle n'est pas défini
                    return redirect('/');
            }
        } else {
            // L'authentification a échoué, rediriger avec un message d'erreur
            return redirect()->back()->withInput()->withErrors(['error' => 'Adresse e-mail ou mot de passe incorrect.']);
        }
    }
}
