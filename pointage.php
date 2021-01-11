<?php
session_start();
$_SESSION['email'] = 'matei@matei.com';
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    ?>
    <form action="" method="post">
    <?php
        $email = $_SESSION['email'];
        $req = $bdd->prepare("SELECT ID FROM people WHERE email = ?");
        $req->execute([
            filter_var($email, FILTER_SANITIZE_EMAIL)
        ]);
        $data = $req->fetch();
        $idUser = $data['ID'];
        $req->closeCursor();

        $req = $bdd->prepare("SELECT check_in, check_out, day FROM Pointage WHERE email_user = ? AND day = ? ORDER BY check_in DESC LIMIT 1");
        $req->execute([
            filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
            date('Y-m-d')
            ]);
        $data = $req->fetch();
        
        $req->closeCursor();
        if (empty($data)) { // si l'array $data est vide
            if (isset($_POST['enter'])) {
                $req = $bdd->prepare("INSERT INTO Pointage (fk_id_user, email_user, day, check_in) VALUES(?, ?, ?, NOW())");
                $req->execute([
                    $idUser,
                    filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                    date('Y-m-d')
                ]);
                $req->closeCursor();
                ?>
                <button type="submit" name="enter" id="enter" disabled>ENTREE</button>
                <button type="submit" name="out" id="out">CHECK-OUT</button>
                <?php
            } else {
                ?>
                <button type="submit" name="enter" id="enter">ENTREE</button>
                <button type="submit" name="out" id="out" disabled>CHECK-OUT</button>
                <?php
            }
        } else { // si l'array $data n'est PAS vide
            
            if ($data['check_out'] === NULL && $data['check_in'] !== NULL) {
                ?>
                    <!-- <button type="submit" name="enter" id="enter">ENTREE</button> -->
                    <!-- <button type="submit" name="out" id="out">CHECK-OUT</button> -->
                <?php
                    if (isset($_POST['out'])) {
                        $req = $bdd->prepare("UPDATE Pointage SET check_out = NOW() WHERE email_user = ? AND day = ?");
                        $req->execute([
                            filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                            date('Y-m-d')
                        ]);
                        $req->closeCursor();
                        ?>
                        <button type="submit" name="enter" id="enter">ENTREE</button>
                        <button type="submit" name="out" id="out" disabled>CHECK-OUT</button>
                        <?php
                    }
            } else if ($data['check_out'] !== NULL && $data['check_in'] !== NULL) { // check_out !== NULL
                ?>
                    <p>you are already registered</p>
                    <!-- <button type="submit" name="enter" id="enter">ENTREE</button> -->
                    <!-- <button type="submit" name="out" id="out">CHECK-OUT</button> -->
                
                <?php
                    
            } else {
                ?>
                
                    <!-- <button type="submit" name="enter" id="enter">ENTREE</button> -->
                    <!-- <button type="submit" name="out" id="out">CHECK-OUT</button> -->
                
                <?php
                if (isset($_POST['enter'])) {
                    $req = $bdd->prepare("INSERT INTO Pointage (fk_id_user, email_user, day, check_in) VALUES(?, ?, NOW())");
                    $req->execute([
                        $idUser,
                        filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                        date('Y-m-d')
                    ]);
                    $req->closeCursor();
                    ?>
                    <button type="submit" name="enter" id="enter" disabled>ENTREE</button>
                    <button type="submit" name="out" id="out">CHECK-OUT</button>
                    <?php
                }
            }
        }
    ?>
    </form>
    <?php



    // if(isset($_POST['enter'])) {
        // $req = $bdd->prepare("INSERT INTO Pointage (email_user, day, check_in) VALUES(?, ?, NOW())");
        // $req->execute([
        //     filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        //     date('Y-m-d')
        // ]);
        // $req->closeCursor();
        // echo "Bienvenue!";
    // } else if (isset($_POST['out'])) {
        // $req = $bdd->prepare("UPDATE Pointage SET check_out = NOW() WHERE email_user = ? AND day = ?");
        // $req->execute([
        //     filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        //     date('Y-m-d')
        // ]);
        // $req->closeCursor();
    //     echo "Bye!";
    // }
?>

