<?php
if (isset($_POST["submit"])) {
    require_once 'functions.inc.php';
    $name = sanitizeData($_POST["name"]);
    $email = sanitizeData($_POST["email"]);
    $username = sanitizeData($_POST["username"]);
    $pwd = sanitizeData($_POST["pwd"]);
    $confirmPwd = sanitizeData($_POST["confirmpwd"]);

    require_once 'dbhandler.inc.php';

    if (emptySignupInput($name, $email, $username, $pwd, $confirmPwd) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if (pwdMatch($pwd, $confirmPwd) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (userAlreadyExist($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=useralreadyexist");
        exit();
    }
    createUser($conn, $name, $email, $username, $pwd);

}
else {
    header('location: ../signup.php');
    exit();
}