<?php
    include_once 'header.php';
?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 mx-auto my-5">
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Please fill in empty fields
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                        }
                    ?>
                    <h1 class="text-center display-5">PROFILE</h1>
                    <div class="rounded-circle mx-auto bg-dark mt-3 overflow-hidden" style="height: 200px; width: 200px; background: url('<?php echo !empty($_SESSION["profilePicture"]) ? "uploads/".$_SESSION["profilePicture"] : "images/default_pics.png" ?>') no-repeat center center; background-size: cover">
                        <!-- <img src="<?//php echo !empty($_SESSION["profilePicture"]) ? "uploads/".$_SESSION["profilePicture"] : "images/default_pics.png" ?>" alt="" class="img-fluid h-100"> -->
                    </div>
                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-person-circle fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php echo $_SESSION["name"] ?></span>
                        <hr>
                    </div>
                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-envelope fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php echo $_SESSION["email"] ?></span>
                        <hr>
                    </div>
                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-person-vcard fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php echo !empty($_SESSION["username"]) ? $_SESSION["username"] : '<span class="lead">UPDATE PROFILE</span>' ?></span>
                        <hr>
                    </div>
                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-phone fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php echo !empty($_SESSION["phoneNumber"]) ? $_SESSION["phoneNumber"] : '<span class="lead">UPDATE PROFILE</span>' ?></span>
                        <hr>
                    </div>

                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-<?php if ($_SESSION["gender"] == "female") {
                            echo "person-standing-dress";
                        }
                        else {
                            echo "person-standing";
                        }
                        ?> fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php echo !empty($_SESSION["gender"]) ? $_SESSION["gender"] : '<span class="lead">UPDATE PROFILE</span>' ?></span>
                        <hr>
                    </div>

                    <div class="text-center mb-3 mt-5">
                        <i class="bi bi-calendar2-event fs-4 me-3"></i>
                        <span class="fs-5 fw-bold"><?php $todaydate = strtotime($_SESSION["dob"]); echo !empty($_SESSION["dob"]) ? date('F j, Y', $todaydate) : '<span class="lead">UPDATE PROFILE</span>' ?></span>
                    </div>
                    
                    <div class="d-grid d-md-flex justify-content-between">
                        <a href="update_profile.php" class="btn btn-primary">Edit</a>
                        <form action="includes/delete_profile.inc.php" method="post">
                           <button class="btn btn-danger" type="submit" name="submit">Delete account</button> 
                        </form>
                        <!-- <a href="delete_profile.php" class="btn btn-danger">Delete account</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'footer.php';
?>