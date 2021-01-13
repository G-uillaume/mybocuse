<?php
    session_start();
    $_SESSION['email'] = 'richard@bidule.com';
    include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
?>
<?php
    $email = $_SESSION['email'];
        
    // ----------- PREMIERE REQUETE POUR RECUPERER L'ID DE L'USER ---------- //

    $req = $bdd->prepare("SELECT ID FROM people WHERE email = ?");
    $req->execute([
        filter_var($email, FILTER_SANITIZE_EMAIL)
    ]);
    $data = $req->fetch();
    $req->closeCursor();
    $idUser = $data['ID']; // ONSTOCKE L'ID DE L'USER

    // REQUETE POUR RECUPERER LES DERNIERS CHECKIN:OUT S'IL Y EN A
    
    $req = $bdd->prepare("SELECT check_in, check_out, day FROM attendance WHERE email_user = ? AND day = ? ORDER BY check_in DESC LIMIT 1");
    $req->execute([
        filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
        date('Y-m-d')
        ]);
    $data = $req->fetch();
    
    $req->closeCursor();
    if (empty($data)) { // SI $data EST VIDE (L'USER N'A ENCORE JAMAIS POINTE DONC N'APPARAIT PAS DANS LA TABLE)
        if (isset($_POST['enter'])) {
            // ON INSERE UNE NOUVELLE LIGNE A LA TABLE
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
    } else { // SI $date N'EST PAS VIDE (L'USER A DEJA POINTE, AUJOURD'HUI OU UN JOUR PRECEDENT)
        
        if ($data['check_out'] === NULL && $data['check_in'] !== NULL) { // SI L'USER A POINTE LE MATIN MAIS PAS LE SOIR
            
            if (isset($_POST['out'])) {
                $req = $bdd->prepare("UPDATE attendance SET check_out = NOW() WHERE email_user = ? AND day = ?");
                $req->execute([
                    filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                    date('Y-m-d')
                ]);
                $req->closeCursor();
                echo 'Aurevoir';
            }

        } else if ($data['check_out'] !== NULL && $data['check_in'] !== NULL) { // SI L'USER A DEJA POINTE MATIN ET SOIR
            
            echo "you are already registered";
                
        } else { // SI L'USER N'A PAS ENCORE POINTE AUJOURD'HUI
            
            if (isset($_POST['enter'])) {
                $req = $bdd->prepare("INSERT INTO attendance (fk_id_user, email_user, day, check_in) VALUES(?, ?, NOW())");
                $req->execute([
                    $idUser,
                    filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
                    date('Y-m-d')
                ]);
                $req->closeCursor();
                echo 'Bienvenue';
            }
        }
    }
?>
