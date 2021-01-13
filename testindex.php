<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>MyBocuse</title>
</head>

<body>

 
<div class="d-flex mx-auto" style="height: 100vh;">

    <nav id="navbarIndex" class="col-5 navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="#">
                <img src="assets/img/chef.png" alt="img" width="200" height="200" class="d-inline-block align-top">
                <h1 id="titre">My.Beaucuz</h1>
            </a>
        </div>
    </nav>

   
    <span class="form col-7">
    <?php 
        include("./includes/login.php");
    ?>
    </span>
   
</div>

<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="./testindex.js"></script>
</body>

</html>