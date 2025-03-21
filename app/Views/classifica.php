<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classifica ATP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Torna alla Dashboard</a>
    </div>
</body>
</html>
