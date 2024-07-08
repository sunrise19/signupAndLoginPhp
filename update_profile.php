<?php
    include_once 'header.php'
?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Please fill in empty fields
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            elseif ($_GET["error"] == "invalidemail") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Email is invalid
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            elseif ($_GET["error"] == "invalidusername") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Username is invalid. Use an alphanumeric word without spaces
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            elseif ($_GET["error"] == "passwordsdontmatch") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Passwords are not similar
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            elseif ($_GET["error"] == "useralreadyexist") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Username or email has already been taken
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            elseif ($_GET["error"] == "stmtfailed") {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ops!</strong> Technical issues. Please try again
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                        }
                    ?>
                    <h1 class="text-center display-5">UPDATE PROFILE</h1>
                    <form action="includes/update_profile.inc.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" id="profilePicture" name="profilePicture">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION["name"]; ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION["username"]; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female" <?php echo $_SESSION["gender"] == "female" ? "selected" : "" ?>>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $_SESSION["phoneNumber"]; ?>" placeholder="080x xxx xxxx">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $_SESSION["dob"]; ?>">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php'
?>