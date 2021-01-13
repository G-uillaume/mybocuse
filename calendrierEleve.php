<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9be8d195b1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>My.Beaucuz</title>
</head>

<body>
    <!------------------------------- Navigation ------------------------------------------>
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="#">
                <img src="assets/img/chef.png" alt="img" width="80" height="80" class="d-inline-block align-top">
                <h1>My.Beaucuz</h1>
            </a>

            <form method="post">

                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"> Profile <i class="fas fa-address-book"></i></button>


                <button type="submit" name="out" value="Deconnexion" class="btn  btn-dark"><a href="./logOut.php">Logout </a> <i class="fas fa-sign-out-alt"></i></button>

            </form>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <h2 style='text-align: center;'>Historique des recettes</h2>
    <?php include('./includes/history_recipes.php') ?>

    <h2 style='text-align: center;'>Historique des presences</h2>
    <?php include('./includes/history.php') ?>

    <!------------------------------- Button Ajouté ------------------------------------------>

    <div class="ajouter">
        <button onmousedown="document.getElementById('id01').style.display='block'" type="button"
            class="btn btn-dark">Ajouté <i class="fas fa-plus-circle"></i></button>
    </div>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;
        </span>
        <form class="modal-content" action="">
            <div class="container">
                <?php include("./includes/recipe_form.php")?>
            </div>
        </form>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>