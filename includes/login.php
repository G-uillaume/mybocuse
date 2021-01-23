<!----------------------------------------SECTION LOGIN------------------------------------------------------------>
<?php
    

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $req = $bdd->prepare("SELECT ID, first_name, last_name, email, password, account_type FROM people WHERE email = ?");
        $req->execute([filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)]);
        $data = $req->fetch();
        if (!empty($data)) {
            if (password_verify($_POST['password'], $data['password'])) {
                $_SESSION['id'] = $data['ID'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['account_type'] = $data['account_type'];
                // if ($data['account_type'] === "Student") {
                //     header("location:calendrierEleve.php");
                // } else {
                //     header('Location:calendrierProf.php');
                // }
                header('Location:calendrier.php');
            }
            else {
                ?>
<section>
    <form style="margin:30px 0px 0px 30px;" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" placeholder="php@hotmaiil.com /*" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" placeholder="WRONG PASSWORD" class="form-control"
                id="exampleInputPassword1">
        </div>

        <input type="submit" value="Log-in" name="btnLogin" class="inputIndex btn btn-dark">
        <input onmousedown="document.getElementById('id01').style.display='block'" type="submit" value="Sign-up"
            name="btnSignup" class="inputIndex btn btn-dark">
    </form>
</section>

<?php
            }
        } else {
            ?>
<section>
    <form style="margin:30px 0px 0px 30px;" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" placeholder="WRONg MAIL ADRESS" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" placeholder="php /*" class="form-control" id="exampleInputPassword1">
        </div>

        <input type="submit" value="Log-in" name="btnLogin" class="inputIndex btn btn-dark">
        <input onmousedown="document.getElementById('id01').style.display='block'" type="submit" value="Sign-up"
            name="btnSignup" class="inputIndex btn btn-dark">
    </form>
</section>

<?php
        }
    } else {
        ?>
<section>
    <form style="margin:30px 0px 0px 30px;" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" placeholder="php@hotmaiil.com /*" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" placeholder="php /*" class="form-control" id="exampleInputPassword1">
        </div>

        <input type="submit" value="Log-in" name="btnLogin" class="inputIndex btn btn-dark">
        <button type="button" class="inputIndex btn btn-dark" data-bs-toggle="modal" data-bs-target="#signupModal">Sign-up</button>
    </form>

    <!----------------------------------------- CREATION MODAL--------------------------------------------------------->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign-up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include('./includes/signup_form.php')?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

</section>

<?php
    }
?>

<!-- <script>
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> -->
