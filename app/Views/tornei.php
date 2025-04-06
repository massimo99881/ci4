<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Tornei</h1>
    <?php 
        // Separa i tornei in "giocati" (passati) e "da giocare" (futuri) basandosi sul campo data_inizio
        $played = [];
        $future = [];
        $current_date = date('Y-m-d');
        foreach ($tornei as $t) {
            if ($t['data_inizio'] < $current_date) {
                $played[] = $t;
            } else {
                $future[] = $t;
            }
        }
        // Ordina in ordine cronologico decrescente (la data più recente in alto)
        usort($played, function($a, $b) {
            return strcmp($b['data_inizio'], $a['data_inizio']);
        });
        usort($future, function($a, $b) {
            return strcmp($b['data_inizio'], $a['data_inizio']);
        });
    ?>

    <!-- Nav tabs di Bootstrap -->
    <ul class="nav nav-tabs" id="torneiTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="giocati-tab" data-bs-toggle="tab" data-bs-target="#giocati" type="button" role="tab" aria-controls="giocati" aria-selected="true">
                Tornei giocati
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="da-giocare-tab" data-bs-toggle="tab" data-bs-target="#da-giocare" type="button" role="tab" aria-controls="da-giocare" aria-selected="false">
                Tornei da giocare
            </button>
        </li>
    </ul>

    <!-- Contenuto dei Tab -->
    <div class="tab-content" id="torneiTabContent">
        <!-- Tab per Tornei giocati -->
        <div class="tab-pane fade show active" id="giocati" role="tabpanel" aria-labelledby="giocati-tab">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th>Nome Torneo</th>
                            <th>Luogo</th>
                            <th>Data Inizio</th>
                            <th>Data Fine</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($played)): ?>
                            <?php foreach ($played as $t): ?>
                                <tr>
                                    
                                    <td><?= esc($t['nome']) ?></td>
                                    <td><?= esc($t['luogo']) ?></td>
                                    <td><?= esc($t['data_inizio']) ?></td>
                                    <td><?= esc($t['data_fine']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5">Nessun torneo giocato trovato.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Tab per Tornei da giocare -->
        <div class="tab-pane fade" id="da-giocare" role="tabpanel" aria-labelledby="da-giocare-tab">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          
                            <th>Nome Torneo</th>
                            <th>Luogo</th>
                            <th>Data Inizio</th>
                            <th>Data Fine</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($future)): ?>
                            <?php foreach ($future as $t): ?>
                                <tr>
                                    
                                    <td><?= esc($t['nome']) ?></td>
                                    <td><?= esc($t['luogo']) ?></td>
                                    <td><?= esc($t['data_inizio']) ?></td>
                                    <td><?= esc($t['data_fine']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5">Nessun torneo da giocare trovato.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
