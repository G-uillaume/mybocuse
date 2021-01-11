<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>My.Beaucuz</title>
</head>

<body>
    <!------------------------------- Navigation ------------------------------------------>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"
                    class="d-inline-block align-top">
                My.Beaucuz
            </a>

            <form method="post">
                <input type="submit" value="Profile" class="btn btn-primary">
                <!-- <p> <strong>/</strong> </p> -->
                <input type="submit" name="out" value="Deconnexion" class="btn btn-primary">

            </form>
        </div>
    </nav>

    <?php
             
        // Something posted
     if (isset($_POST['out'])) {
        include("logOut.php");
    }
    ?>

    <!------------------------------- Pointage ------------------------------------------>
    <section class="pointage">

        <button type="button" class="btn btn-dark">9:00</button>
        <!-- <input type="submit" value="9:00" class="btn btn-dark"> -->
        <button type="button" class="btn btn-dark">17:00</button>

    </section>

    <!------------------------------- Calendrier ------------------------------------------>

    <table class="table mx-auto">
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

    <!------------------------------- Button envoyé ------------------------------------------>

    <div class="envoyer">
        <button onmousedown="document.getElementById('id01').style.display='block'" type="button"
            class="btn btn-dark">Envoyé</button>
    </div>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">&times;</span>
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




</body>

</html>