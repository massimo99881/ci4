<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>I miei biglietti acquistati</h2>
    <table class="table table-bordered">
         <thead>
             <tr>
                <th>Torneo</th>
                <th>Prezzo Unitario</th>
                <th>Quantità</th>
                <th>Totale Speso</th>
                <th>Data di Acquisto</th>
                <th>Azioni</th> <!-- Nuova colonna per il bottone Elimina -->
             </tr>
         </thead>
         <tbody>
              <?php if (!empty($acquisti)): ?>
                  <?php foreach($acquisti as $acquisto): ?>
                    <tr>
                       <td><?= esc($acquisto['nomeTorneo']) ?></td>
                       <td><?= esc($acquisto['prezzo']) ?> €</td>
                       <td><?= esc($acquisto['quantita']) ?></td>
                       <td><?= esc($acquisto['prezzo'] * $acquisto['quantita']) ?> €</td>
                       <td><?= esc($acquisto['created_at']) ?></td>
                       <td>
                           <!-- Form per eliminare l'acquisto -->
                           <form action="<?= site_url('Acquisti/delete/' . $acquisto['id']) ?>" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo acquisto?');">
                               <button type="submit" class="btn btn-danger">Elimina</button>
                           </form>
                       </td>
                    </tr>
                  <?php endforeach; ?>
              <?php else: ?>
                  <tr><td colspan="6">Nessun biglietto acquistato.</td></tr>
              <?php endif; ?>
         </tbody>
    </table>
</div>

<?= $this->endSection() ?>
