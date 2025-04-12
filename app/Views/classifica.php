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
                <?php if(session()->get('ruolo')==='admin'): ?>
                <th>Azioni</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classifica as $giocatore): ?>
                <tr data-id="<?= esc($giocatore['id']) ?>">
                    <td><?= esc($giocatore['posizione']) ?></td>
                    <td><?= esc($giocatore['nome']) ?></td>
                    <td><?= esc($giocatore['cognome']) ?></td>
                    <td><?= esc($giocatore['nazione']) ?></td>
                    <td class="punti-cell"><?= esc($giocatore['punti']) ?></td>
                    <?php if(session()->get('ruolo')==='admin'): ?>
                    <td>
                        <button class="btn btn-primary btn-sm modifica-btn">Modifica</button>
                        <button class="btn btn-success btn-sm salva-btn d-none">Salva</button>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('Dashboard/index') ?>" class="btn btn-primary">Torna alla Dashboard</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestione pulsante MODIFICA / SALVA per le righe della classifica
    document.querySelectorAll('.modifica-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var row = btn.closest('tr');
            var puntiCell = row.querySelector('.punti-cell');
            var currentPunti = puntiCell.textContent.trim();
            // Trasforma il contenuto in un campo di input
            puntiCell.innerHTML = '<input type="number" class="form-control form-control-sm" value="' + currentPunti + '">';
            btn.classList.add('d-none');
            row.querySelector('.salva-btn').classList.remove('d-none');
        });
    });

    document.querySelectorAll('.salva-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var row = btn.closest('tr');
            var puntiInput = row.querySelector('.punti-cell input');
            var nuovoPunti = puntiInput.value;
            var rankingId = row.getAttribute('data-id'); // Utilizziamo il campo 'id' della tabella ranking

            // Invia la modifica al server via fetch
            fetch("<?= site_url('classifica/update') ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ id: rankingId, punti: nuovoPunti })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Aggiorna la cella con il nuovo valore e ripristina il pulsante
                    row.querySelector('.punti-cell').innerHTML = nuovoPunti;
                    btn.classList.add('d-none');
                    row.querySelector('.modifica-btn').classList.remove('d-none');
                } else {
                    alert("Errore nell'aggiornamento dei punti.");
                }
            })
            .catch(error => {
                console.error('Errore:', error);
            });
        });
    });
});
</script>
<?= $this->endSection() ?>
