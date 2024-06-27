<?php
    include_once 'header.php'
?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "none") {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Sign up successful
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                        }
                    ?>
                    <h1 class="text-center display-5">LOGIN</h1>
                    <form action="includes/login.inc.php" method="post">
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="pwd">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'footer.php'
?>
