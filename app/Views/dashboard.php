<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tennis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TennisApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="News/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">News</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Classifica/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Classifica</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Negozio/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Negozio</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Tornei/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Prossimi Tornei</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Risultati/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Risultati Recenti</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Giocatori/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Giocatori in Evidenza</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Biglietti/index" method="post">
                        <button type="submit" class="btn btn-link nav-link">Acquisto Biglietti</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="Auth/logout" method="post">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('images/carlitos.jpg') ?>" class="d-block w-100" alt="Carlitos Image">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/sinner.jpg') ?>" class="d-block w-100" alt="Sinner Image">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/wimbledon.jpg') ?>" class="d-block w-100" alt="Wimbledon Image">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<!-- Benvenuto -->
<div class="container text-center mt-4">
    <h1>Benvenuto, <?= session()->get('nome') ?>!</h1>
    <p>Email: <?= session()->get('email') ?></p>
    <p>Ruolo: <?= session()->get('ruolo') ?></p>
</div>

<!-- Sezione Notizie -->
<div class="container mt-4">
    <h2>Ultime Notizie</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://source.unsplash.com/400x250/?tennis-player" class="card-img-top" alt="News">
                <div class="card-body">
                    <h5 class="card-title">Grande vittoria a Wimbledon</h5>
                    <p class="card-text">Jannik Sinner trionfa in una partita epica.</p>
                    <a href="#" class="btn btn-primary">Leggi di più</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
