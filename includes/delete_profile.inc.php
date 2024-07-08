<?php
    session_start();
    if (isset($_POST["submit"])) {
        require_once("dbhandler.inc.php");
        require_once("functions.inc.php");

        $userId = $_SESSION["userId"];
        deleteProfile($conn, $userId);
    }
    header("location: ../profile.php");
    exit();