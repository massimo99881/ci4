<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Confronta Giocatori</h1>
    
    <!-- Card per il Primo Giocatore -->
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= (strpos($player1['img'], 'http') === 0) ? $player1['img'] : base_url('images/giocatori/'.$player1['img']) ?>" class="img-fluid rounded-start" alt="<?= esc($player1['nome']) ?>">
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
    
    <!-- Form per selezionare il Secondo Giocatore -->
    <form method="get" action="<?= site_url('Giocatori/confronta/'.$player1['id']) ?>" class="mb-4">
        <div class="row align-items-end">
            <div class="col-md-6">
                <label for="player2" class="form-label">Seleziona il giocatore da confrontare:</label>
                <select name="p2" id="player2" class="form-select" required>
                    <option value="">-- Seleziona un giocatore --</option>
                    <?php foreach ($playersList as $p): ?>
                        <option value="<?= esc($p['id']) ?>" <?= (isset($player2) && $player2 && $player2['id'] == $p['id']) ? 'selected' : '' ?>>
                            <?= esc($p['nome'] . ' ' . $p['cognome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Confronta</button>
            </div>
        </div>
    </form>
    
    <?php if ($player2): ?>
    <!-- Tabella di confronto -->
    <h2>Confronto: <?= esc($player1['nome'] . ' ' . $player1['cognome']) ?> vs <?= esc($player2['nome'] . ' ' . $player2['cognome']) ?></h2>
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
            // Definiamo i parametri da confrontare (etichetta => chiave)
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
                // Determina quale valore è migliore: in questo esempio assumiamo che un valore maggiore sia migliore
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
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
