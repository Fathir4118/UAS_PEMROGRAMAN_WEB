<?php 

class Controller {
    // Method untuk memanggil view
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    // Method untuk memanggil model (persiapan buat tahap selanjutnya)
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}