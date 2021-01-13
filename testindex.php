<?php 
    session_start();
    include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>MyBocuse</title>
</head>

<body>


    <div class="d-flex mx-auto" style="height: 100vh;">

        <nav id="navbarIndex" class="col-5 navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex" href="#">
                    <img src="assets/img/chef.png" alt="img" width="80" height="80" class="d-inline-block align-top">
                    <h1 id='titre'>My.Beaucuz</h1>
                </a>
            </div>
        </nav>
        


        <span class="col-7" style="margin-top: 38vh;">
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