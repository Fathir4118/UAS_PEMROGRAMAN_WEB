<?php 

class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function proses() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data['user'] = $this->model('User_model')->getUserByUsername($username);

        // Cek apakah user ada
        if($data['user']) {
            // Cek password (karena di DB kita tadi tulis plain text, kita cek langsung)
            // Untuk keamanan asli nanti pakai password_verify()
            if($password == $data['user']['password']) {
                
                // Set Session
                $_SESSION['user_login'] = true;
                $_SESSION['role'] = $data['user']['role'];
                $_SESSION['nama_user'] = $data['user']['username'];

                header('Location: ' . BASEURL . '/buku');
                exit;
            } else {
                // Password salah
                Flasher::setFlash('gagal', 'Login (Password Salah)', 'danger');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            // Username tidak ada
            Flasher::setFlash('gagal', 'Login (Username tidak ditemukan)', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}