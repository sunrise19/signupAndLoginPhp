<?php
    function sanitizeData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function emptySignupInput($name, $email, $username, $pwd, $confirmPwd){
        $result = "";
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($confirmPwd)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result = "";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidUsername($username){
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function pwdMatch($pwd, $confirmPwd){
        if ($pwd !== $confirmPwd) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function userAlreadyExist($conn, $username, $email){
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        } 
        //bind parameters to stmt
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        //executing statement 
        mysqli_stmt_execute($stmt);
        // retrieving from executed statement
        $retrieveData = mysqli_stmt_get_result($stmt);
        // fetch and store in an associative
        
        $row = mysqli_fetch_assoc($retrieveData);
        mysqli_stmt_close($stmt);
        if ($row) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        
    }
    function createUser($conn, $name, $email, $username, $pwd){
        $sql = "INSERT INTO users(name, email, username, pwd) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        } 

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //bind parameters to stmt
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        //executing statement 
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("location: ../login.php?error=none");
        exit();
    }

    function emptyLoginInput($username, $pwd){
        $result = "";
        if (empty($username) || empty($pwd)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pwd){
        $getUser = userAlreadyExist($conn, $username, $username);
        if ($getUser == false) {
            header("location: ../login.php?error=wronginputs");
            exit();
        }

        // $checkPwd = $getUser["pwd"];
        $comparePwd = password_verify($pwd, $getUser["pwd"]);
        if ($comparePwd == false) {
            header("location: ../login.php?error=wrongpassword");
            exit();
        }
        else {
            session_start();

            $_SESSION["userId"] = $getUser["id"];
            $_SESSION["username"] = $getUser["username"];
            $_SESSION["name"] = $getUser["name"];
            $_SESSION["email"] = $getUser["email"];
            $_SESSION["gender"] = $getUser["gender"];
            $_SESSION["profilePicture"] = $getUser["profilePicture"];
            $_SESSION["phoneNumber"] = $getUser["phoneNumber"];
            $_SESSION["dob"] = $getUser["dob"];
            header("location: ../index.php");
            exit();
        }
        
    }

    function updateUser($conn, $userId, $username, $gender, $phoneNumber, $dob, $profilePictureNewName){
        $sql = "UPDATE users SET username = ?, gender = ?, phoneNumber = ?, dob = ?, profilePicture = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../update_profile.php?error=stmtfailed");
            exit();
        } 
        //bind parameters to stmt
        mysqli_stmt_bind_param($stmt, "sssssi", $username, $gender, $phoneNumber, $dob, $profilePictureNewName, $userId);
        //executing statement 
        if(!mysqli_stmt_execute($stmt)){
            header("location: ../update_profile.php?error=updatefailed");
            exit();
        }

        mysqli_stmt_close($stmt);

        $getUpdate = userAlreadyExist($conn, $username, $username); 
        if ($getUpdate !== false) {
            session_start();

            $_SESSION["username"] = $getUpdate["username"];
            $_SESSION["phoneNumber"] = $getUpdate["phoneNumber"];
            $_SESSION["dob"] = $getUpdate["dob"];
            $_SESSION["gender"] = $getUpdate["gender"];
            $_SESSION["profilePicture"] = $getUpdate["profilePicture"];

            header("location: ../profile.php?error=none");
            exit();
        }
    }

    function deleteProfile($conn, $userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        session_unset();
        session_destroy();

        header("location: ../index.php?error=none");
        exit();
    }





