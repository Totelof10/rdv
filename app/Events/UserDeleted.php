<?php
namespace App\Events;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserDeleted
{
    public function __construct(Model $model)
    {
        // Récupère le modèle supprimé
        $this->model = $model;
    }

    public function handle()
    {
        // Récupère l'utilisateur suivant dans la base de données
        $nextUser = User::where('id', '>', $this->model->id)->orderBy('id', 'asc')->first();

        // Si l'utilisateur suivant existe, met à jour son identifiant
        if ($nextUser) {
            DB::statement("UPDATE users SET id = id - 1 WHERE id = ?", [$nextUser->id]);
        }
    }
}
