<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center">Classifica ATP</h2>
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Posizione</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Nazione</th>
                <th>Punti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classifica as $giocatore): ?>
                <tr>
                    <td><?= esc($giocatore['posizione']) ?></td>
                    <td><?= esc($giocatore['nome']) ?></td>
                    <td><?= esc($giocatore['cognome']) ?></td>
                    <td><?= esc($giocatore['nazione']) ?></td>
                    <td><?= esc($giocatore['punti']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('Dashboard/index') ?>" class="btn btn-primary">Torna alla Dashboard</a>
</div>

<?= $this->endSection() ?>
