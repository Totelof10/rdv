<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\UserDeleted;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function afficherFormulaire()
    {
        return view('inscription.inscrire');
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

        return redirect('/')->with('success','Ajout reussi');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Récupère l'utilisateur par son ID ou renvoie une erreur 404 si non trouvé
        return view('edit', compact('user'));
    }



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>]+$/'
            ],
            'role' => 'required|unique:users,role,' . $id,
        ]);

        // Recherche de l'utilisateur par son ID
        $user = User::find($id);

        // Vérifier si l'utilisateur existe
        if ($user) {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            // Vérifie si un nouveau mot de passe est fourni
            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }
            $user->role = $validatedData['role'];
            $user->save();

            return redirect('/dashboard/dsic')->with('success', 'Utilisateur mis à jour avec succès');
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            return redirect('/dashboard/dsic')->with('error', 'Utilisateur non trouvé');
        }
        
    }


    public function destroy($id)
    {
        // Recherche de l'utilisateur par son ID
        $user = User::find($id);

        // Vérifiez si l'utilisateur existe avant de le supprimer
        if ($user) {
            $user->delete();
            return redirect('dashboard/dsic');
            // Ajoutez ici d'autres instructions si nécessaire, par exemple, redirection vers une autre page
        } else {
            // Gérez le cas où l'utilisateur n'existe pas
            // Par exemple, vous pourriez retourner une réponse avec un message d'erreur
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }
    }


}
