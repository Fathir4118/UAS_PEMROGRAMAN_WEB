<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                    Tambah Data Buku
                </button>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/buku/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari buku.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Buku Perfeelus</h3>
            <ul class="list-group">
                <?php foreach( $data['buku'] as $buku ) : ?>
                    <li class="list-group-item">
                        <?= $buku['judul']; ?>
                        
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                            <a href="<?= BASEURL; ?>/buku/hapus/<?= $buku['id']; ?>" class="badge bg-danger float-end ms-1 text-decoration-none" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
                            
                            <a href="<?= BASEURL; ?>/buku/ubah/<?= $buku['id']; ?>" class="badge bg-success float-end ms-1 text-decoration-none tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $buku['id']; ?>">Ubah</a>
                        <?php endif; ?>
                        
                        <a href="<?= BASEURL; ?>/buku/detail/<?= $buku['id']; ?>" class="badge bg-primary float-end ms-1 text-decoration-none">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/buku/tambah" method="post">
            <input type="hidden" name="id" id="id">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun" name="tahun">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>