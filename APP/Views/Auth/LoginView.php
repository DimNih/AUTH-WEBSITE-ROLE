<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>


<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4">LOGIN</h3>
        <form method="POST" action="<?= BASE_URL ?>/login">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

           <div class="mb-3">
    <label class="form-label">Password</label>

    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" required>

        <button type="button" class="btn btn-outline-secondary" id="togglePass">
            👁
        </button>
    </div>
</div>


            <button class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>
                Belum punya akun? 
                <a href="<?= BASE_URL ?>/register">Register</a>
            </small>
        </div>
    </div>
</div>

<script>
const pass = document.getElementById("password");
const toggle = document.getElementById("togglePass");

toggle.addEventListener("click", () => {
    if(pass.type === "password") {
        pass.type = "text";
        toggle.textContent = "🙈";
    } else {
        pass.type = "password";
        toggle.textContent = "👁";
    }
});
</script>

</body>
</html>
