<?php 

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        // Urutannya: Header -> Isi -> Footer
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}