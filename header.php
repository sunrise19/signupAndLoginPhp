<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark text-white" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
            <?php
                function isActive($page){
                    return basename($_SERVER['REQUEST_URI']) == $page ? 'active' : '';
                }
                if (isset($_SESSION["username"])) {
                    echo '<li class="nav-item">
                    <a class="nav-link ' . isActive("profile.php") . '" aria-current="page" href="profile.php">Profile</a>
                    </li>';
                    echo '<li class="nav-item">
                    <a class="nav-link" aria-current="page" href="includes/logout.inc.php">Logout</a>
                    </li>';
                }
                else{
                    echo '<li class="nav-item">
                    <a class="nav-link ' . isActive("signup.php") . '" aria-current="page" href="signup.php">Sign Up</a>
                    </li>';
                    echo '<li class="nav-item">
                    <a class="nav-link ' . isActive("login.php") . '" aria-current="page" href="login.php">Login</a>
                    </li>';
                }
            ?>
        </ul>
        </div>
    </div>
    </nav>