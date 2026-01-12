<div class="container mt-5">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $data['buku']['judul']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $data['buku']['penulis']; ?></h6>
        <p class="card-text">
            Penerbit: <?= $data['buku']['penerbit']; ?> <br>
            Tahun: <?= $data['buku']['tahun']; ?>
        </p>
        <a href="<?= BASEURL; ?>/buku" class="card-link">Kembali</a>
      </div>
    </div>

</div>