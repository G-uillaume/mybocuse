<?php
    session_start();
    $_SESSION['mail'] = 'kill@coach.com';
    include('includes/secret.php');
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $req = $bdd->prepare("SELECT account_type FROM people WHERE email = ?");
    $req->execute([
        filter_var($_SESSION['mail'], FILTER_SANITIZE_EMAIL)
    ]);
    $data = $req->fetch();
    $req->closeCursor();

    if ($data['account_type'] == 'Student') {
        $req = $bdd->prepare("SELECT a.email_user AS email, a.check_in AS check_in, a.check_out AS check_out
        FROM attendance AS a
        INNER JOIN people AS p
            ON p.id = a.fk_id_user
            WHERE a.email_user = ?");
        $req->execute([
            filter_var($_SESSION['mail'], FILTER_SANITIZE_EMAIL)
        ]);
        while ($data = $req->fetch()) {
            if (!empty($data)) {
                echo "<p>Vous avez pointé à " . $data['check_in'] . " et " . $data['check_out'] . "</p>";
            } else {
                echo 'Trop nul';
            }
        }
        $req->closeCursor();
    } else {
        if (!empty($_POST['student'])) {
            $req = $bdd->prepare("SELECT a.email_user AS email, a.check_in AS check_in, a.check_out AS check_out,
            p.first_name AS first_name, p.last_name AS last_name
            FROM attendance AS a
            LEFT JOIN people AS p
                ON p.id = a.fk_id_user
                WHERE p.ID = ?");
            $req->execute([
                strip_tags(trim($_POST['student']))
            ]);
            while ($data = $req->fetch()) {
                if (!empty($data)) {
                    echo "<p>" . $data['first_name'] . " " . $data['last_name'] . " a pointé à " . $data['check_in'] . " et " . $data['check_out'] . "</p>";
                } else {
                   echo "Il y a eu une erreur"; 
                }
        }
        echo "Cet étudiant n'a jamais pointé...";

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