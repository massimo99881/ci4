<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Tornei</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Torneo</th>
                <th>Luogo</th>
                <th>Data Inizio</th>
                <th>Data Fine</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tornei)): ?>
                <?php foreach ($tornei as $t): ?>
                <tr>
                    <td><?= esc($t['id']) ?></td>
                    <td><?= esc($t['nome']) ?></td>
                    <td><?= esc($t['luogo']) ?></td>
                    <td><?= esc($t['data_inizio']) ?></td>
                    <td><?= esc($t['data_fine']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Nessun torneo trovato.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
