<?php


require '../APP/Controllers/AuthController.php';
require '../APP/Controllers/AdminController.php';
require '../APP/Controllers/DosenController.php';
require '../APP/Controllers/MahasiswaController.php';


$basePath = dirname($_SERVER['SCRIPT_NAME']);
define('BASE_URL', rtrim($basePath, '/'));
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace(BASE_URL, '', $uri);
$uri = $uri ?: '/';

$auth = new AuthController();

switch ($uri) {

    case '/':
    case '/login':
        if($_SERVER['REQUEST_METHOD'] == 'POST') $auth->login();
        else $auth->showLogin();
        break;

    case '/register':
        if($_SERVER['REQUEST_METHOD'] == 'POST') $auth->register();
        else $auth->showRegister();
        break;

    case '/logout':
        $auth->logout();
        break;

    case '/admin/dashboard':
        (new AdminController)->dashboard();
        break;

    case '/dosen/dashboard':
        (new DosenController)->dashboard();
        break;

    case '/mahasiswa/dashboard':
        (new MahasiswaController)->dashboard();
        break;

    default:
        http_response_code(404);
        $code = 404;
        $title = "Halaman Tidak Ditemukan";
        $message = "Maaf, halaman yang kamu cari tidak tersedia.";
        require '../APP/Views/Error.php';

}
