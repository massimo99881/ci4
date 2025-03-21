<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

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

<?= $this->endSection() ?>
