<!----------------------------------------SECTION LOGIN------------------------------------------------------------>
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
        <input onmousedown="document.getElementById('id01').style.display='block'" type="submit" value="Sign-up"
            name="btnSignup" class="inputIndex btn btn-dark">
    </form>
</section>

<!---------------------------VERIFICATION LOGIN OU SIGN-UP--------------------------------------------------------->
<?php

if (isset($_POST['btnLogin'])) {
  header("location:calendrierEleve.php");

}
 
?>

<!----------------------------------------- CREATION MODAL--------------------------------------------------------->
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
        title="Close Modal">&times;</span>
    <form class="index-modal-content" action="">
        <div class="container">
            <?php include("./includes/signup_form.php")?>
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