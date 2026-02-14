<?php
class MahasiswaController {

    private function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        if($_SESSION['user']['role'] != 'mahasiswa') {
            http_response_code(403);
            die("403 Forbidden");
        }
    }

    public function dashboard() {
        $this->check();
        require __DIR__ . '/../Views/Dashboard/MahasiswaDashboard.php';
    }
}
