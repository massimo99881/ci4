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
        <?php if (!empty($news)): ?>
            <?php foreach($news as $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?= (strpos($item['img'], 'http') === 0) ? $item['img'] : base_url($item['img']) ?>" class="card-img-top" alt="<?= esc($item['titolo']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['titolo']) ?></h5>
                            <p class="card-text">
                                <?= (strlen($item['descrizione']) > 50) ? substr($item['descrizione'], 0, 50) . '...' : esc($item['descrizione']) ?>
                            </p>
                            <a href="<?= site_url('News/detail/' . $item['id']) ?>" class="btn btn-primary">Leggi di più</a>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nessuna notizia disponibile.</p>
        <?php endif; ?>
    </div>
</div>


<?= $this->endSection() ?>
