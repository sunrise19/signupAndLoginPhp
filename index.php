<?php
    include_once 'header.php'
?>

    <section>
        <div class="container mt-5">
            <h1 class="text-center display-5">WELCOME <?php echo isset($_SESSION["username"]) ? $_SESSION["name"] : ""?></h1>
        </div>
    </section>
    
<?php
    include_once 'footer.php'
?>