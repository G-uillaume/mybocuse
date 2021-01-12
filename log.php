<?php
    include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $req = $bdd->prepare("SELECT email, password FROM people WHERE email = ?");
        $req->execute([filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)]);
        $data = $req->fetch();
        if (!empty($data)) {
            if (password_verify($_POST['password'], $data['password'])) {
                echo "Welcome !";
            }
            else {
                echo "Wrong password !";
            }
        } else {
            echo "Wrong email adress";
        }
    }
    else {
        ?>

        <form method="post" action="">
            <p><label for="email">Email : </label><input id="email" name="email" type="mail"></p>
            <p><label for="password">Password : </label><input id="password" name="password" type="password"></p>
            <input type="submit">
        </form>

        <?php
    }
?>