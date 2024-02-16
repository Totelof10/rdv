<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Rendez-vous INSTAT</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 100px 25px;
            text-align: center;
            margin-bottom: 0;
        }

        .btn-get-started {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 30px;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gestion de Rendez-vous INSTAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('connexion.login')}}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $totalUsers >= 3 ? 'disabled' : '' }}" href="{{ $totalUsers >= 3 ? '#' : route('inscription.inscrire') }}" role="button">
                            S'inscrire
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1 class="display-4">Bienvenue sur notre application de gestion de rendez-vous</h1>
        <p class="lead">Planifiez et gérez facilement vos rendez-vous en ligne.</p>
        <hr class="my-4">
        <p>Prêt à commencer ?</p>
        <a class="btn btn-primary btn-lg btn-get-started" href="{{route('connexion.login')}}" role="button">Commencer</a>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Gestion de Rendez-vous. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
