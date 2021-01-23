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

    <?php
            
        // Something posted
    if (isset($_POST['out'])) {
        include("logOut.php");
    }
    ?>

    <!------------------------------- Historique ------------------------------------------>
    <!-- <section class="historique">

        <button type="button" class="btn btn-dark">Historique <i class="fas fa-align-center"></i></button>

    </section> -->

    <!------------------------------- Calendrier ------------------------------------------>


    <div class="container">
        <div class="tableauProf row mt-5">
            <div class="col-5">
                <h2 class="h2Prof">History of recipes</h2>
                <div class="tabRecipe" style="overflow-x:auto; max-height: 60vh;">
                <?php
                    include("history_recipes_prof.php");
                ?>
                </div>
                <!------------------------------- Button Ajouté ------------------------------------------>

                <div class="ajouter">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#recipesProfModal">Add recipe <i class="fas fa-plus-circle"></i></button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="recipesProfModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a recipe watch</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php include('recipe_form.php')?>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------------- Button Ajouté ------------------------------------------>
            </div>

            <div class="col sm-1">

            </div>

        <div class="col-5">
            <h2 class="h2Prof">History of attendances</h2>
            <div class="tabcheck" style="overflow-x:auto; max-height: 60vh;">
                <?php include("history_attendance_prof.php"); ?>
                    

            <!------------------------------- Button Selected ------------------------------------------>

            <!------------------------------- Button Selected ------------------------------------------>
            </div>
                <div class="dropdown">
                    <button class="promo btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Promo
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="calendrierProf.php">All</a></li>
                        <li><a class="dropdown-item" href="calendrierProf.php?promo=bocuse">Bocuse</a></li>
                        <li><a class="dropdown-item" href="calendrierProf.php?promo=lignac">Lignac</a></li>
                        <li><a class="dropdown-item" href="calendrierProf.php?promo=ramsey">Ramsey</a></li>
                    </ul>
                
                </div>

        </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>