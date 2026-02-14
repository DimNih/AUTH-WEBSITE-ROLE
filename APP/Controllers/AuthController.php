<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    private $user;
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->user = new User();
    }
    public function showLogin() {
    if(isset($_SESSION['user'])) {
        header("Location: " . BASE_URL . "/" . $_SESSION['user']['role'] . "/dashboard");
        exit;
    }
    require __DIR__ . '/../Views/Auth/LoginView.php';
}


   public function showRegister() {
    if(isset($_SESSION['user'])) {
        header("Location: " . BASE_URL . "/" . $_SESSION['user']['role'] . "/dashboard");
        exit;
    }
    require __DIR__ . '/../Views/Auth/RegisterView.php';
}

   public function register() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if(strlen($password) < 6) {
        $_SESSION['error'] = "Password minimal 6 karakter";
        header("Location: " . BASE_URL . "/register");
        exit;
    }

    if($this->user->findByEmail($email)) {
        $_SESSION['error'] = "Email sudah terdaftar";
        header("Location: " . BASE_URL . "/register");
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $this->user->create($name, $email, $hash, $role);

    $_SESSION['success'] = "Register berhasil, silakan login";
    header("Location: " . BASE_URL . "/login");
    exit;
}

public function login() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->user->findByEmail($email);

    if(!$user || !password_verify($password, $user['password'])) {
        $_SESSION['error'] = "Email atau password salah";
        header("Location: " . BASE_URL . "/login");
        exit;
    }

    $_SESSION['user'] = $user;

    header("Location: " . BASE_URL . "/" . $user['role'] . "/dashboard");
    exit;
}


    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "/login");
        exit;
    }
}
