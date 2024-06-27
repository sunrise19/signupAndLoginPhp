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
                    <h1 class="text-center display-5">SIGN UP</h1>
                    <form action="includes/signup.inc.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="pwd">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirmpwd">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'footer.php'
?>
