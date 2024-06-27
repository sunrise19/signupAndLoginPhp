<?php
    if (isset($_POST["submit"])) {
        require_once 'functions.inc.php';
        $username = sanitizeData($_POST["username"]);
        $pwd = sanitizeData($_POST["pwd"]);

        require_once 'dbhandler.inc.php';
        if (emptyLoginInput($username, $pwd) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        loginUser($conn, $username, $pwd);
    }
    header("location: login.php");
    exit();