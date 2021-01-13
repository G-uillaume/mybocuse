<?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if(isset($_POST['enter'])) {
        $req = $bdd->prepare("INSERT INTO Pointage (fk_id_user, day, check_in, check_out) VALUES(?, ?, NOW(), NOW())");
        $req->execute([
            filter_var($_POST['email']),
            date('Y-m-d')
        ]);
        $req->closeCursor();
        echo "Bienvenue!";
    } else if (isset($_POST['out'])) {
        $req = $bdd->prepare("UPDATE Pointage SET check_out = NOW() WHERE fk_id_user = ? AND day = ?");
        $req->execute([
            // filter_var($_POST['']),
            date('Y-m-d')
        ]);
        $req->closeCursor();
        echo "Bye!";
    }
?>

<form action="" method="post">
<label for="email">Email : </label>
<input type="email" name="email" id="email">
<button type="submit" name="enter">ENTREE</button>
<button type="submit" name="out">SORTIE</button>
</form>