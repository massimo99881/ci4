<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Confronta Giocatori</h1>
    
    <!-- Card del Primo Giocatore -->
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= (strpos($player1['img'], 'http') === 0) ? $player1['img'] : base_url($player1['img']) ?>" class="img-fluid rounded-start" alt="<?= esc($player1['nome']) ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($player1['nome'] . ' ' . $player1['cognome']) ?></h5>
                    <p class="card-text">
                        <strong>Nazione:</strong> <?= esc($player1['nazione']) ?><br>
                        <strong>Età:</strong> <?= esc($player1['eta']) ?> anni<br>
                        <strong>Altezza:</strong> <?= esc($player1['altezza']) ?> cm<br>
                        <strong>Peso:</strong> <?= esc($player1['peso']) ?> kg<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <?php if (!$player2): ?>
    <!-- Se non è stato selezionato il secondo giocatore, mostra la search bar e la tabella dei risultati -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Cerca giocatore (nome, cognome, età)">
    </div>
    
    <table class="table table-bordered table-striped" id="confrontaTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Nazione</th>
                <th>Età</th>
                <th>Confronta</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($playersList)): ?>
                <?php foreach ($playersList as $p): ?>
                    <tr>
                        <td><?= esc($p['id']) ?></td>
                        <td><?= esc($p['nome']) ?></td>
                        <td><?= esc($p['cognome']) ?></td>
                        <td><?= esc($p['nazione']) ?></td>
                        <td><?= esc($p['eta']) ?></td>
                        <td>
                            <button class="btn btn-success btn-sm confronta-btn" data-id="<?= esc($p['id']) ?>">Confronta</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nessun giocatore trovato.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php else: ?>
    <!-- Se il secondo giocatore è stato selezionato, mostra la sua card -->
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= (strpos($player2['img'], 'http') === 0) ? $player2['img'] : base_url($player2['img']) ?>" class="img-fluid rounded-start" alt="<?= esc($player2['nome']) ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($player2['nome'] . ' ' . $player2['cognome']) ?></h5>
                    <p class="card-text">
                        <strong>Nazione:</strong> <?= esc($player2['nazione']) ?><br>
                        <strong>Età:</strong> <?= esc($player2['eta']) ?> anni<br>
                        <strong>Altezza:</strong> <?= esc($player2['altezza']) ?> cm<br>
                        <strong>Peso:</strong> <?= esc($player2['peso']) ?> kg<br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabella comparativa dei parametri tecnici -->
    <h2>Confronto Parametri Tecnici</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Parametro</th>
                <th><?= esc($player1['nome']) ?></th>
                <th><?= esc($player2['nome']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $parameters = [
                'Velocità del servizio (km/h)' => 'velocita_servizio',
                'Potenza del dritto' => 'potenza_dritto',
                'Precisione del dritto' => 'precisione_dritto',
                'Potenza del rovescio' => 'potenza_rovescio',
                'Precisione del rovescio' => 'precisione_rovescio',
                'Mobilità' => 'mobilita',
                'Resistenza' => 'resistenza'
            ];
            ?>
            <?php foreach ($parameters as $label => $key): ?>
            <?php 
                $p1_value = $player1[$key];
                $p2_value = $player2[$key];
                $p1_class = '';
                $p2_class = '';
                if ($p1_value > $p2_value) {
                    $p1_class = 'table-success';
                } elseif ($p2_value > $p1_value) {
                    $p2_class = 'table-success';
                }
            ?>
            <tr>
                <td><?= esc($label) ?></td>
                <td class="<?= $p1_class ?>"><?= esc($p1_value) ?></td>
                <td class="<?= $p2_class ?>"><?= esc($p2_value) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
    <!-- Pulsante "INDIETRO" per tornare alla schermata di selezione del secondo giocatore -->
    <div class="mt-3 text-end">
        <a href="<?= site_url('Giocatori/confronta/'.$player1['id']) ?>" class="btn btn-secondary">INDIETRO</a>
    </div>
    <?php endif; ?>
</div>

<script>
// Filtraggio dinamico della tabella in base alla search bar (richiede almeno 2 caratteri)
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    var query = this.value.toLowerCase();
    var rows = document.querySelectorAll('#confrontaTable tbody tr');
    if(query.length >= 2) {
        rows.forEach(function(row) {
            var cells = row.querySelectorAll('td');
            var match = false;
            // Controlla le colonne: nome, cognome, età (indici 1, 2, 4)
            [1, 2, 4].forEach(function(i) {
                if(cells[i].textContent.toLowerCase().indexOf(query) !== -1) {
                    match = true;
                }
            });
            row.style.display = match ? '' : 'none';
        });
    } else {
        rows.forEach(function(row) {
            row.style.display = '';
        });
    }
});

// Gestione del pulsante "Confronta" in ogni riga della tabella
document.querySelectorAll('.confronta-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var p2 = this.getAttribute('data-id');
        // Reindirizza alla stessa pagina con il parametro p2 impostato
        window.location.href = "<?= site_url('Giocatori/confronta/'.$player1['id']) ?>" + "?p2=" + p2;
    });
});
</script>
<?= $this->endSection() ?>
