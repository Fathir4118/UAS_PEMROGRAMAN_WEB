<?php 

class App {
    // Default controller & method jika URL kosong
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // 1. Cek Controller (URL index ke-0)
        if(isset($url[0])) {
            if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 2. Cek Method (URL index ke-1)
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Cek Params (Sisa URL)
        if(!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan Controller & Method, kirimkan Params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if(isset($_GET['url'])) {
            // Bersihkan URL dari tanda / di akhir
            $url = rtrim($_GET['url'], '/');
            // Bersihkan dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah jadi array
            $url = explode('/', $url);
            return $url;
        }
    }
}