<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Negozio - Acquisto Biglietti</title>
    <!-- Se usi Bootstrap, aggiungi i link CSS/JS -->
</head>
<body>

<div class="container mt-4">
    <h1>Acquista Biglietti</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Torneo</th>
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
                    <td><?= esc($b['prezzo']) ?> €</td>
                    <td><?= esc($b['disponibilita']) ?></td>
                    <td>
                        <!-- Form per l'acquisto -->
                        <form action="<?= site_url('Negozio/buy') ?>" method="post" class="form-inline">
                            <input type="hidden" name="biglietto_id" value="<?= $b['id'] ?>">
                            <input type="number" name="quantita" value="1" min="1" 
                                   max="<?= $b['disponibilita'] ?>" 
                                   class="form-control" style="width:100px">
                            <button type="submit" class="btn btn-primary">Acquista</button>
                        </form>
                    </td>
                    <td>
                        <!-- Qui potresti mettere pulsanti aggiuntivi 
                             o altre funzionalità legate all'acquisto -->
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Nessun biglietto disponibile.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
