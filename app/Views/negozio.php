<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Acquista Biglietti</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Torneo</th>
                <th>Periodo</th>
                <th>Prezzo</th>
                <th>Disponibilità</th>
                <th>Quantità</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($biglietti)): ?>
            <?php foreach ($biglietti as $b): ?>
                <tr>
                    <td><?= esc($b['nomeTorneo']) ?></td>
                    <td>
                        <?= date("d/m/Y", strtotime($b['data_inizio'])) ?> - <?= date("d/m/Y", strtotime($b['data_fine'])) ?>
                    </td>
                    <td><?= esc($b['prezzo']) ?> €</td>
                    <td><?= esc($b['disponibilita']) ?></td>
                    <td>
                        <!-- Input quantità, non parte del form -->
                        <input type="number" id="quantita_<?= $b['id'] ?>" value="1" min="1" max="<?= $b['disponibilita'] ?>" class="form-control" style="width:100px">
                    </td>
                    <td>
                        <!-- Form per l'acquisto, con hidden per la quantità -->
                        <form action="<?= site_url('Negozio/buy') ?>" method="post">
                            <input type="hidden" name="biglietto_id" value="<?= $b['id'] ?>">
                            <input type="hidden" name="quantita" id="form_quantita_<?= $b['id'] ?>" value="1">
                            <button type="submit" class="btn btn-primary" onclick="document.getElementById('form_quantita_<?= $b['id'] ?>').value = document.getElementById('quantita_<?= $b['id'] ?>').value;">
                                Acquista
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Nessun biglietto disponibile.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
