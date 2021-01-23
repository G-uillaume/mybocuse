
<header class="header-content">
    <?php include('smallscreen.php')?>
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


                <button type="submit" name="out" value="Deconnexion" class="btn  btn-dark"><a
                        href="./logOut.php">Logout
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
                    <?php include('profile.php')?>
                </div>
            </div>
        </div>
    </div>



    <!------------------------------- Pointage ------------------------------------------>
    <section class="pointage">
        <button id="enter" class="btn btn-dark">9:00<i class="fas fa-sun"></i></button>
        <button id="out" class="btn btn-dark" disabled>17:00<i class="fas fa-moon"></i></button>




    </section>

    <!------------------------------- Calendrier ------------------------------------------>

    <h2>History of attendances</h2>
    <?php include('history.php') ?>

    <h2>History of recipes</h2>
    <?php include('history_recipes.php') ?>



    <!------------------------------- Button Ajouté ------------------------------------------>


    <div class="ajouter">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recipesModal">Add Recipe
            <i class="fas fa-plus-circle"></i>
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
                    <?php include('recipe_form.php')?>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="pointage.js"></script>
