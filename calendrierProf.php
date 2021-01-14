<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9be8d195b1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
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
                <img src="assets/img/chef.png" alt="img" width="80" height="80"
                    class="d-inline-block align-top">
                    <h1>My. Beaucuz</h1>
            </a>

            <form method="post">
               
                <button type="submit" name="profile" value="Profile" class="btn btn-dark"> Profile <i class="fas fa-address-book"></i></button>
                <button type="submit" name="out" value="Deconnexion" class="btn  btn-dark"><a href="./logOut.php">Logout</a> <i class="fas fa-sign-out-alt"></i></button>

            </form>
        </div>
    </nav>

    <?php
             
        // Something posted
     if (isset($_POST['out'])) {
        include("logOut.php");
    }
    ?>

    <!------------------------------- Historique ------------------------------------------>
    <section class="historique">

        <button type="button" class="btn btn-dark">Historique <i class="fas fa-align-center"></i></button>

    </section>

    <!------------------------------- Calendrier ------------------------------------------>

    <table class="tableRecipe table mx-auto">
        <thead>
            <tr>
                <th scope="col">Monday </th>
                <th scope="col">Tuesday</th>
                <th scope="col">Wednesday</th>
                <th scope="col">Thursday</th>
                <th scope="col">Friday</th>
                <th scope="col">Saturday</th>
                <th scope="col">Sunday</th>
            </tr>
        </thead class="jourSemaine">
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>

            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>

        </tbody>

    </table>

    <!------------------------------- Button Ajouté ------------------------------------------>

    <div class="ajouter">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recipesProfModal">Ajouter <i class="fas fa-plus-circle"></i></button>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="recipesProfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>