@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <h3 class="navbar-brand m-3" href="#">SP</h3>
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
    <div class="ui animated button" tabindex="0">
        <div class="visible content">Next</div>
        <div class="hidden content">
            <i class="right arrow icon"></i>
        </div>
    </div>
</nav>
@endsection