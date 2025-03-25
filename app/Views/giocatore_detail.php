<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <!-- Immagine del giocatore -->
    <img src="<?= (strpos($giocatore['img'], 'http') === 0) ? $giocatore['img'] : base_url($giocatore['img']) ?>" class="card-img-top" alt="<?= esc($giocatore['nome']) ?>">
    <div class="card-body">
      <h5 class="card-title"><?= esc($giocatore['nome'] . ' ' . $giocatore['cognome']) ?></h5>
      <p class="card-text">
         <strong>Nazione:</strong> <?= esc($giocatore['nazione']) ?><br>
         <strong>Età:</strong> <?= esc($giocatore['eta']) ?> anni<br>
         <strong>Altezza:</strong> <?= esc($giocatore['altezza']) ?> cm<br>
         <strong>Peso:</strong> <?= esc($giocatore['peso']) ?> kg<br>
         <strong>Mano dominante:</strong> <?= esc($giocatore['mano_dominante']) ?><br>
         <strong>Velocità del servizio:</strong> <?= esc($giocatore['velocita_servizio']) ?> km/h<br>
         <strong>Potenza del dritto:</strong> <?= esc($giocatore['potenza_dritto']) ?><br>
         <strong>Precisione del dritto:</strong> <?= esc($giocatore['precisione_dritto']) ?><br>
         <strong>Potenza del rovescio:</strong> <?= esc($giocatore['potenza_rovescio']) ?><br>
         <strong>Precisione del rovescio:</strong> <?= esc($giocatore['precisione_rovescio']) ?><br>
         <strong>Mobilità:</strong> <?= esc($giocatore['mobilita']) ?><br>
         <strong>Resistenza:</strong> <?= esc($giocatore['resistenza']) ?>
      </p>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="<?= site_url('Giocatori/index') ?>" class="btn btn-primary">Torna indietro</a>
        <a href="<?= site_url('Giocatori/confronta/'.$giocatore['id']) ?>" class="btn btn-secondary">Confronta</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
