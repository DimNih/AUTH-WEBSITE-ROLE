<?php
class DosenController {

    private function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if($_SESSION['user']['role'] != 'dosen') {
            http_response_code(403);
            die("403 Forbidden");
        }
    }

    public function dashboard() {
        $this->check();
        require __DIR__ . '/../Views/Dashboard/DosenDashboard.php';
    }
}
