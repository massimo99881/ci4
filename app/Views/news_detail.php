<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Carousel con l'immagine della news -->
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= (strpos($news['img'], 'http') === 0) ? $news['img'] : base_url($news['img']) ?>" class="d-block w-100" alt="<?= esc($news['titolo']) ?>">
            </div>
        </div>
    </div>

    <!-- Titolo e descrizione -->
    <div class="mt-4">
        <h2><?= esc($news['titolo']) ?></h2>
        <p><?= esc($news['descrizione']) ?></p>
    </div>
</div>

<?= $this->endSection() ?>
