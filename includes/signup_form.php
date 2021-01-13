<?php
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['newEmail']) && !empty($_POST['newPassword'])) {
        $firstName = strip_tags(trim($_POST['firstname']));
        $req = $bdd->prepare("SELECT EXISTS(SELECT email FROM people WHERE email = ?)");
        $req->execute([filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL)]);
        $result = $req->fetchColumn();
        $req->closeCursor();
        if (!$result) {
            $req = $bdd->prepare("INSERT INTO people (first_name, last_name, email, password, account_type) VALUES(?, ?, ?, ?, 'student')");
            $req->execute([
                strip_tags(trim($_POST['firstname'])),
                strip_tags(trim($_POST['lastname'])),
                filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL),
                password_hash($_POST['newPassword'], PASSWORD_DEFAULT)
            ]);
            $req->closeCursor();
            ?>
            <h2>Welcome <?php echo $firstName; ?> !</h2>
            <button type="submit" class="inputIndex btn btn-dark"><a href="./testindex.php">Log in</a></button>
            <?php
        } else {
            ?>
        <section class="signupForm">
            <form style="margin:30px 0px 0px 30px;" method="post">

                <div class="mb-3">
                    <label  class="form-label">Firstname</label>
                    <input type="text" name="firstname" placeholder="Paul" class="form-control">
                </div>

                <div class="mb-3">
                    <label  class="form-label">Lastname</label>
                    <input type="text" name="lastname" placeholder="Sernine" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="newEmail" placeholder="THIS MAIL IS ALREADY USED" class="form-control" aria-describedby="emailHelp" style="border: 2px solid red;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="newPassword" placeholder="********" class="form-control" id="exampleInputPassword1">
                </div>

                <input type="submit" value="Sign-up" name="btnSignup" class="btn btn-dark">
            </form>
        </section>
        <?php
        }
    }
    else {
        ?>
        <section class="signupForm">
            <form style="margin:30px 0px 0px 30px;" method="post">

                <div class="mb-3">
                    <label  class="form-label">Firstname</label>
                    <input type="text" name="firstname" placeholder="Paul" class="form-control">
                </div>

                <div class="mb-3">
                    <label  class="form-label">Lastname</label>
                    <input type="text" name="lastname" placeholder="Sernine" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="newEmail" placeholder="Ex: paulsernine@gmail.com" class="form-control" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="newPassword" placeholder="********" class="form-control" id="exampleInputPassword1">
                </div>

                <input type="submit" value="Sign-up" name="btnSignup" class="btn btn-dark">
            </form>
        </section>
        <?php
    }
?>