<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
  <h1>Giocatori</h1>
  
  <!-- Searchbar -->
  <div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Cerca giocatore (nome, cognome, nazione, età)">
  </div>
  
  <!-- Tabella con risultati -->
  <table class="table table-bordered table-striped" id="giocatoriTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Nazione</th>
        <th>Età</th>
        <th>Dettaglio</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($giocatori)): ?>
        <?php foreach($giocatori as $g): ?>
          <tr>
            <td><?= esc($g['id']) ?></td>
            <td><?= esc($g['nome']) ?></td>
            <td><?= esc($g['cognome']) ?></td>
            <td><?= esc($g['nazione']) ?></td>
            <td><?= esc($g['eta']) ?></td>
            <td>
              <a href="<?= site_url('Giocatori/detail/' . $g['id']) ?>" class="btn btn-primary btn-sm">Dettaglio</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="6">Nessun giocatore trovato.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- JavaScript per il filtraggio dei risultati -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
  var query = this.value.toLowerCase();
  var rows = document.querySelectorAll('#giocatoriTable tbody tr');
  // Avvia la ricerca solo se la query ha almeno 2 caratteri
  if(query.length >= 2) {
    rows.forEach(function(row) {
      // Verifica le colonne: nome, cognome, nazione, età (colonne 1-4)
      var cells = row.querySelectorAll('td');
      var match = false;
      for(var i = 1; i <= 4; i++){
        if(cells[i].textContent.toLowerCase().indexOf(query) !== -1) {
          match = true;
          break;
        }
      }
      row.style.display = match ? '' : 'none';
    });
  } else {
    // Se la query è inferiore a 2 caratteri, mostra tutte le righe
    rows.forEach(function(row) {
      row.style.display = '';
    });
  }
});
</script>
<?= $this->endSection() ?>
