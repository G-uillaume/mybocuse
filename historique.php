<?php
    session_start();
    $_SESSION['mail'] = 'flo@bxl.com';
    // ----------- CONNEXION A LA BASE DE DONNEES ---------- //
    include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } 
    catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    // ----------- PREMIERE REQUETE POUR RECUPERE L'ACCOUNT_TYPE ('Student' ou 'Chef') ---------- //


    $req = $bdd->prepare("SELECT account_type FROM people WHERE email = ?");
    $req->execute([
        filter_var($_SESSION['mail'], FILTER_SANITIZE_EMAIL)
    ]);
    $data = $req->fetch();
    $req->closeCursor();

    // ----------- ON N'AFFICHE PAS LA MÊME CHOSE SELON L'ACCOUNT-TYPE ---------- //


    if ($data['account_type'] == 'Student') {
        // REQUETE POUR RECUPERER LES HEURES DE CHECKIN/OUT EN FONCTION DE L'EMAIL DE L'USER
        $req = $bdd->prepare("SELECT a.email_user AS email, a.check_in AS check_in, a.check_out AS check_out
        FROM attendance AS a
        RIGHT JOIN people AS p -- ICI RIGHT JOIN FONCTIONNE, MAIS PAS INNER NI LEFT, JE SAIS PAS POURQUOI
            ON p.id = a.fk_id_user
            WHERE p.email = ?");
        $req->execute([
            filter_var($_SESSION['mail'], FILTER_SANITIZE_EMAIL)
        ]);
        while ($data = $req->fetch()) {
            print_r($data);
            if (!isset($data['check_in']) && !isset($data['check_out'])) {
                echo "Vous n'avez encore jamais pointé !";
            } else {
                echo "<p>Vous avez pointé à " . $data['check_in'] . " et " . $data['check_out'] . "</p>";
            }
        }
        $req->closeCursor();
    } else { // SI C'EST UN CHEF
        if (!empty($_POST['student'])) { // TANT QU'ON N'A PAS REMPLI LE FORMULAIRE
            // REQUETE POUR RECUPERE LES HEURES DE CHECKIN/OUT EN FONCTION DU STUDENT SELECTIONNE DANS LE FORMULAIRE
            $req = $bdd->prepare("SELECT a.email_user AS email, a.check_in AS check_in, a.check_out AS check_out,
            p.first_name AS first_name, p.last_name AS last_name
            FROM attendance AS a
            RIGHT JOIN people AS p -- ICI RIGHT JOIN FONCTIONNE, MAIS PAS INNER NI LEFT, JE SAIS PAS POURQUOI
                ON p.id = a.fk_id_user
                WHERE p.ID = ?");
                
            $req->execute([
                strip_tags(trim($_POST['student']))
            ]);

            while ($data = $req->fetch()) {
                if (!isset($data['check_in']) && !isset($data['check_out'])) {
                    echo $data['first_name'] . " " . $data['last_name'] . " n'a jamais pointé...";
                } else {
                echo "<p>" . $data['first_name'] . " " . $data['last_name'] . " a pointé à " . $data['check_in'] . " et " . $data['check_out'] . "</p>";
                }
            }

        } else {
        ?>
        <form method='POST' action=''>
            <select name='student'>
                <?php
                    $req = $bdd->query("SELECT ID,first_name, last_name FROM people WHERE account_type = 'Student'");
                    while($data = $req->fetch()) {
                        ?><option value="<?php echo $data['ID']; ?>"><?php echo $data['first_name'] . " " . $data['last_name']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <button type="submit">Look</button>
        </form>
        <?php
        }
    }
?>