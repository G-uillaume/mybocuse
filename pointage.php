<?php
session_start();
$_SESSION['email'] = 'bernardMinet@gmail.com';
include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    ?>
    <?php
        $email = $_SESSION['email'];
        $req = $bdd->prepare("SELECT ID FROM people WHERE email = ?");
        $req->execute([
            filter_var($email, FILTER_SANITIZE_EMAIL)
        ]);
        $data = $req->fetch();
        $req->closeCursor();
        $idUser = $data['ID'];

        $req = $bdd->prepare("SELECT check_in, check_out, day FROM attendance WHERE email_user = ? AND day = ? ORDER BY check_in DESC LIMIT 1");
        $req->execute([
            filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
            date('Y-m-d')
            ]);
        $data = $req->fetch();
        
        $req->closeCursor();
        if (empty($data)) { // si l'array $data est vide
            if (isset($_POST['enter'])) {
                $req = $bdd->prepare("INSERT INTO attendance (fk_id_user, email_user, day, check_in) VALUES(?, ?, ?, NOW())");
                $req->execute([
                    $idUser,
                    filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                    date('Y-m-d')
                ]);
                $req->closeCursor();
                echo 'Bienvenue';
                ?>
                <?php
            }
        } else { // si l'array $data n'est PAS vide
            
            if ($data['check_out'] === NULL && $data['check_in'] !== NULL) {
                ?>
                <?php
                    if (isset($_POST['out'])) {
                        $req = $bdd->prepare("UPDATE attendance SET check_out = NOW() WHERE email_user = ? AND day = ?");
                        $req->execute([
                            filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                            date('Y-m-d')
                        ]);
                        $req->closeCursor();
                        echo 'Aurevoir';
                        ?>
                        <?php
                    }
            } else if ($data['check_out'] !== NULL && $data['check_in'] !== NULL) { // check_out !== NULL
                
                    echo "you are already registered";
                
                
                    
            } else {
                ?>
                
                
                <?php
                if (isset($_POST['enter'])) {
                    $req = $bdd->prepare("INSERT INTO attendance (fk_id_user, email_user, day, check_in) VALUES(?, ?, NOW())");
                    $req->execute([
                        $idUser,
                        filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                        date('Y-m-d')
                    ]);
                    $req->closeCursor();
                    echo 'Bienvenue';
                    ?>
                    <?php
                }
            }
        }
    
    ?>
    <?php

?>

