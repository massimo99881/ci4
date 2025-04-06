<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Partite</h1>

    <?php
    // Separa le partite in giocate e da giocare basandosi sulla data_inizio del torneo
    $played = [];
    $future = [];
    $current_date = date('Y-m-d');
    foreach ($partite as $p) {
        if ($p['data_inizio'] < $current_date) {
            $played[] = $p;
        } else {
            $future[] = $p;
        }
    }
    // Ordina in ordine cronologico decrescente (la partita con la data più recente in alto)
    usort($played, function($a, $b) {
        return strcmp($b['data_inizio'], $a['data_inizio']);
    });
    usort($future, function($a, $b) {
        return strcmp($b['data_inizio'], $a['data_inizio']);
    });

    // Funzione per determinare il vincitore basata sul campo "risultato"
    // Il risultato è una stringa con i set separati da ";"
    // La funzione conta i set vinti da ciascun giocatore e restituisce:
    //   1 se il giocatore1 ha vinto, 2 se il giocatore2 ha vinto, 0 in caso di parità.
    function getMatchWinner($result) {
        $sets = explode(';', $result);
        $player1Sets = 0;
        $player2Sets = 0;
        foreach ($sets as $set) {
            $set = trim($set);
            if (empty($set)) continue;
            list($score1, $score2) = explode(':', $set);
            if ((int)$score1 > (int)$score2) {
                $player1Sets++;
            } elseif ((int)$score2 > (int)$score1) {
                $player2Sets++;
            }
        }
        if ($player1Sets > $player2Sets) return 1;
        if ($player2Sets > $player1Sets) return 2;
        return 0;
    }
    ?>

    <!-- Bootstrap Nav Tabs -->
    <ul class="nav nav-tabs" id="partiteTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="giocate-tab" data-bs-toggle="tab" data-bs-target="#giocate" type="button" role="tab" aria-controls="giocate" aria-selected="true">Partite Giocate</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="da-giocare-tab" data-bs-toggle="tab" data-bs-target="#da-giocare" type="button" role="tab" aria-controls="da-giocare" aria-selected="false">Partite da Giocare</button>
      </li>
    </ul>

    <div class="tab-content" id="partiteTabContent">
        <!-- Tab Pane per Partite Giocate -->
        <div class="tab-pane fade show active" id="giocate" role="tabpanel" aria-labelledby="giocate-tab">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Torneo</th>
                            <th>Luogo</th>
                            <th>Data Inizio</th>
                            <th>Giocatore 1</th>
                            <th>Giocatore 2</th>
                            <th>Risultato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($played)): ?>
                            <?php foreach ($played as $p): ?>
                                <?php $winner = getMatchWinner($p['risultato']); ?>
                                <tr>
                                    <td><?= esc($p['id']) ?></td>
                                    <td><?= esc($p['nomeTorneo']) ?></td>
                                    <td><?= esc($p['luogo']) ?></td>
                                    <td><?= esc($p['data_inizio']) ?></td>
                                    <td class="<?= ($winner == 1) ? 'table-success' : '' ?>">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= (strpos($p['imgGiocatore1'], 'http') === 0) ? $p['imgGiocatore1'] : base_url($p['imgGiocatore1']) ?>" alt="<?= esc($p['nomeGiocatore1']) ?>" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span><?= esc($p['nomeGiocatore1'] . ' ' . $p['cognomeGiocatore1']) ?></span>
                                        </div>
                                    </td>
                                    <td class="<?= ($winner == 2) ? 'table-success' : '' ?>">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= (strpos($p['imgGiocatore2'], 'http') === 0) ? $p['imgGiocatore2'] : base_url($p['imgGiocatore2']) ?>" alt="<?= esc($p['nomeGiocatore2']) ?>" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span><?= esc($p['nomeGiocatore2'] . ' ' . $p['cognomeGiocatore2']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php 
                                        $sets = explode(';', $p['risultato']);
                                        foreach ($sets as $set) {
                                            echo '<div>' . esc($set) . '</div>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7">Nessuna partita giocata.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Pane per Partite Da Giocare -->
        <div class="tab-pane fade" id="da-giocare" role="tabpanel" aria-labelledby="da-giocare-tab">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Torneo</th>
                            <th>Luogo</th>
                            <th>Data Inizio</th>
                            <th>Giocatore 1</th>
                            <th>Giocatore 2</th>
                            <th>Risultato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($future)): ?>
                            <?php foreach ($future as $p): ?>
                                <tr>
                                    <td><?= esc($p['id']) ?></td>
                                    <td><?= esc($p['nomeTorneo']) ?></td>
                                    <td><?= esc($p['luogo']) ?></td>
                                    <td><?= esc($p['data_inizio']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= (strpos($p['imgGiocatore1'], 'http') === 0) ? $p['imgGiocatore1'] : base_url($p['imgGiocatore1']) ?>" alt="<?= esc($p['nomeGiocatore1']) ?>" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span><?= esc($p['nomeGiocatore1'] . ' ' . $p['cognomeGiocatore1']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= (strpos($p['imgGiocatore2'], 'http') === 0) ? $p['imgGiocatore2'] : base_url($p['imgGiocatore2']) ?>" alt="<?= esc($p['nomeGiocatore2']) ?>" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">
                                            <span><?= esc($p['nomeGiocatore2'] . ' ' . $p['cognomeGiocatore2']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $p['risultato'] ? esc($p['risultato']) : 'Da giocare' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7">Nessuna partita da giocare.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
