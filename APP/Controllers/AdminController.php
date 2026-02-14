<?php
class AdminController {

    private function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        if($_SESSION['user']['role'] != 'admin') {
            http_response_code(403);
            die("403 Forbidden");
        }
    }

    public function dashboard() {
        $this->check();
        require __DIR__ . '/../Views/Dashboard/AdminDashboard.php';
    }
}

