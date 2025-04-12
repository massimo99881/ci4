<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tutte le News</h2>
    
    <?php if(session()->get('ruolo') === 'admin'): ?>
    <!-- Form per inserire una nuova news (mostrato solo all'admin) -->
    <div class="mb-4">
        <form action="<?= site_url('News/insert') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" required>
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Immagine (URL o file locale)</label>
                <input type="text" class="form-control mb-2" id="img" name="img_url" placeholder="Inserisci l'URL dell'immagine">
                <span>Oppure carica un file:</span>
                <input type="file" class="form-control" id="img_file" name="img_file">
            </div>
            <button type="submit" class="btn btn-success">Inserisci News</button>
        </form>
    </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th>Immagine</th>
                <?php if(session()->get('ruolo') === 'admin'): ?>
                <th>Azioni</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($news)): ?>
                <?php foreach($news as $item): ?>
                    <tr>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['titolo']) ?></td>
                        <td><?= esc($item['descrizione']) ?></td>
                        <td>
                            <img src="<?= (strpos($item['img'], 'http') === 0) ? $item['img'] : base_url($item['img']) ?>" alt="<?= esc($item['titolo']) ?>" style="width:100px;">
                        </td>
                        <?php if(session()->get('ruolo') === 'admin'): ?>
                        <td>
                            <form action="<?= site_url('News/delete/'.$item['id']) ?>" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa news?');">
                                <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="<?= (session()->get('ruolo')==='admin') ? 5 : 4 ?>">Nessuna notizia disponibile.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
