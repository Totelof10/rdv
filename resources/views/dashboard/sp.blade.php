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
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="ui teal inverted button add-btn" data-day="Lundi">Lundi</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="ui teal inverted button add-btn" data-day="Mardi">Mardi</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="ui teal inverted button add-btn" data-day="Mercredi">Mercredi</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="ui teal inverted button add-btn" data-day="Jeudi">Jeudi</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="ui teal inverted button add-btn" data-day="Vendredi">Vendredi</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <!-- Ajout du conteneur pour les tableaux -->
    <div id="table-container"></div>
    <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButtons = document.querySelectorAll('.add-btn');
        const tableContainer = document.getElementById('table-container');

        addButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const day = this.getAttribute('data-day');
                const table = document.createElement('table');
                table.classList.add('table', 'table-bordered', 'mt-3');
                const tableContent = document.createElement('tbody');
                table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom(s)</th>
                            <th>Numero</th>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control"/></td>
                            <td><input type="text" class="form-control"/></td>
                            <td><input type="text" class="form-control"/></td>
                            <td><input type="date" class="form-control"/></td>
                            <td><input type="time" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                `;
                table.appendChild(tableContent);
                tableContainer.innerHTML = `<h3>Rendez-vous ${day}</h3>`; // Clear existing table
                tableContainer.appendChild(table);
            });
        });
    });
</script>
@endsection
