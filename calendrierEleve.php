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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9be8d195b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">

    <title>My.Beaucuz</title>
</head>

<body>
    <header class="header-content">
        <?php include('./includes/smallscreen.php')?>
    </header>
    <!------------------------------- Navigation ------------------------------------------>
        <main class="body-content">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex" href="#">
                    <img src="assets/img/chef.png" alt="img" width="80" height="80" class="d-inline-block align-top">
                    <h1>My. Beaucuz</h1>
                </a>

                <form method="post">

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#profileModal">
                        Profile <i class="fas fa-address-book"></i></button>


                    <button type="submit" name="out" value="Deconnexion" class="btn  btn-dark"><a href="./logOut.php">Logout
                        </a> <i class="fas fa-sign-out-alt"></i></button>

                </form>
            </div>
        </nav>


        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include('./includes/profile.php')?>
                    </div>
                </div>
            </div>
        </div>


        <!------------------------------- Pointage ------------------------------------------>
        <section class="pointage">

            <button type="submit" class="btn btn-dark">9:00<i class="fas fa-sun"></i></button>
            <!-- <input type="submit" value="9:00" class="btn btn-dark"> -->
            <button type="submit" class="btn btn-dark">17:00<i class="fas fa-moon"></i></button>

        </section>

        <!------------------------------- Calendrier ------------------------------------------>

    <h2>Historique des recettes</h2>
    <?php include('./includes/history_recipes.php') ?>

    <h2>Historique des presences</h2>
    <?php include('./includes/history.php') ?>

        <!------------------------------- Button Ajouté ------------------------------------------>


        <div class="ajouter">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recipesModal">Ajouter <i class="fas fa-plus-circle"></i>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="recipesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a recipe watch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include('./includes/recipe_form.php')?>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>