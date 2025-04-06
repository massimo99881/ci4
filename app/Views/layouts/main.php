<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'TennisApp' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar comune -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('dashboard') ?>">TennisApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="<?= site_url('News/index') ?>" method="post">
                        <button type="submit" class="btn btn-link nav-link">News</button>
                    </form>
                </li>
                <!-- Inserisco "Partite" e "Tornei" prima di "Classifica" -->
                <li class="nav-item">
                    <form action="<?= site_url('Partite/index') ?>" method="get">
                        <button type="submit" class="btn btn-link nav-link">Partite</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('Tornei/index') ?>" method="get">
                        <button type="submit" class="btn btn-link nav-link">Tornei</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('classifica/index') ?>" method="get">
                        <button type="submit" class="btn btn-link nav-link">Classifica</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('Negozio/index') ?>" method="get">
                        <button type="submit" class="btn btn-link nav-link">Negozio</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('Acquisti/index') ?>" method="get">
                        <button type="submit" class="btn btn-link nav-link">I miei biglietti</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('Giocatori/index') ?>" method="post">
                        <button type="submit" class="btn btn-link nav-link">Giocatori</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?= site_url('Auth/logout') ?>" method="post">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sezione per il contenuto specifico -->
<?= $this->renderSection('content') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
