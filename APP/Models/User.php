<?php
require_once __DIR__ . '/../../Config/koneksi.php';

class User {

    public function create($name,$email,$password,$role) {
        global $conn;
        $sql = "INSERT INTO users(name,email,password,role) VALUES('$name','$email','$password','$role')";
        return mysqli_query($conn,$sql);
    }

    public function findByEmail($email) {
        global $conn;
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        return mysqli_fetch_assoc($result);
    }
}
