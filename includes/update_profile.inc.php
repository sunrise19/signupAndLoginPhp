<?php
    session_start();
    if (isset($_POST["submit"])) {
        require_once 'functions.inc.php';
        
        $userId = $_SESSION['userId'];
        $username = sanitizeData($_POST['username']);
        $gender = sanitizeData($_POST['gender']);
        $phoneNumber = sanitizeData($_POST['phoneNumber']);
        $dob = sanitizeData($_POST['dob']);
        
        require_once 'dbhandler.inc.php';
        $profilePicture = $_FILES["profilePicture"];
        // print_r($profilePicture);
        $profilePictureName = $profilePicture["name"];
        $profilePictureTmpName = $profilePicture["tmp_name"];
        $profilePictureErr = $profilePicture["error"];
        $profilePictureSize = $profilePicture["size"];
        $profilePictureType = $profilePicture["type"];

        $profilePictureExt = explode(".", $profilePictureName);
        $profilePictureActualExt = strtolower(end($profilePictureExt));
        // print_r($profilePictureActualExt);
        $allowedExt = array("jpg","jpeg","png","gif");

        if (in_array($profilePictureActualExt, $allowedExt)){
            if ($profilePictureErr == 0) {
                if ($profilePictureSize <= 1000000) {
                    $profilePictureNewName = $username . date("Y-m-d-h-i-sa") . "." . $profilePictureActualExt;
                    $profilePictureDestination = "../uploads/" . $profilePictureNewName;
                    move_uploaded_file($profilePictureTmpName, $profilePictureDestination);
                }
                else{
                    header("location: ../update_profile.php?error=filetoolarge");
                    exit();
                }
            }
            else{
                header("location: ../update_profile.php?error=fileerror");
                exit();
            }
        }
        else{
            header("location: ../update_profile.php?error=invalidfiletype");
            exit();
        }
        
        updateUser($conn, $userId, $username, $gender, $phoneNumber, $dob, $profilePictureNewName);
    }
    else {
        header("location: ../update_profile.php");
        exit();
    }