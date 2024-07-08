<?php
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "mydatabase2";

    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // mysqli_close($conn);
