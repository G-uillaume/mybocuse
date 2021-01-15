<?php 
    session_start();
    include('includes/connexion.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>MyBocuse</title>
</head>

<body>


    <div class="allIndex d-flex mx-auto">

        <nav id="navbarIndex" class="col-5 navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex" href="#">
                    <img src="assets/img/chef.png" alt="img" width="200" height="200" class="logo d-inline-block align-top">
                    <h1 id='titre'>My. Beaucuz</h1>
                </a>
            </div>
        </nav>
        


        <span class="form col-7">
            <?php 
            if (!isset($_POST["btnSignup"])) {
                include("includes/login.php");
            }
            else {
                include("includes/signup_form.php");

            }
    ?>
        </span>

    </div>

    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="./app.js"></script>

</body>

</html>