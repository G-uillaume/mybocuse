<?php
    include("secret.php");
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
?>