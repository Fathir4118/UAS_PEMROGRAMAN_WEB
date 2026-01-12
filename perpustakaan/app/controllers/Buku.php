<?php 

class Buku extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    // --- INI BAGIAN YANG BARU DITAMBAHKAN (DETAIL) ---
    public function detail($id) {
        $data['judul'] = 'Detail Buku';
        // Menggunakan method getBukuById yang sudah ada di Model
        $data['buku'] = $this->model('Buku_model')->getBukuById($id);
        
        $this->view('templates/header', $data);
        $this->view('buku/detail', $data); // Memanggil view detail
        $this->view('templates/footer');
    }
    // --------------------------------------------------

    public function tambah() {
        if( $this->model('Buku_model')->tambahDataBuku($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function hapus($id) {
        if( $this->model('Buku_model')->hapusDataBuku($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
    }

    public function ubah() {
        if( $this->model('Buku_model')->ubahDataBuku($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function cari() {
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->model('Buku_model')->cariDataBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }
}