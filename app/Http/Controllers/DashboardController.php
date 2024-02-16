<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard for the DG.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dg()
    {
        return view('dashboard.dg');
    }

    /**
     * Show the dashboard for the SP.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sp()
    {
        return view('dashboard.sp');
    }

    /**
     * Show the dashboard for the DSIC.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dsic()
    {
        // Récupérer les données nécessaires pour afficher la vue du tableau de bord
        $dashboardData = [
            // Insérez ici les données spécifiques à afficher sur le tableau de bord DSIC
        ];

        // Récupérer les utilisateurs depuis la base de données
        $users = User::all();

        // Passer les données à la vue du tableau de bord DSIC
        return view('dashboard.dsic', [
            'dashboardData' => $dashboardData,
            'users' => $users,
        ]);
    }
}
