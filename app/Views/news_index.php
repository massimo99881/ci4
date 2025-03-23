<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tutte le News</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th>Immagine</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($news)): ?>
                <?php foreach($news as $item): ?>
                    <tr>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['titolo']) ?></td>
                        <td><?= esc($item['descrizione']) ?></td>
                        <td>
                            <img src="<?= (strpos($item['img'], 'http') === 0) ? $item['img'] : base_url($item['img']) ?>" alt="<?= esc($item['titolo']) ?>" style="width:100px;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Nessuna notizia disponibile.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
