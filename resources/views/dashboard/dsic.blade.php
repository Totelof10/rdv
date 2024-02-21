@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <h3 class="navbar-brand m-3" href="#">DSIC</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Les utilisateurs</h2>
<a href="{{route('inscription.ajout')}}" class="btn btn-primary m-2">
    Ajouter un nouveau utilisateur
</a>

    <table class="table">
        <thead>
            <tr>
                <td scope="col">Fonction</td>
                <td scope="col">Nom</td>
                <td scope="col">Email</td>
                <td scope="col">Modification</td>
                <td scope="col">Suppression</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->role}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ url('/modifcompte/'.$user->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                </td>
                <td>
                    <form action="{{ url('/modifcompte/'.$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection