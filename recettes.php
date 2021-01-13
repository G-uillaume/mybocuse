<?php
session_start();


try {
    $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<form method="POST" action="">

<!-- <div>
<label for="email">Email ID</label>
<input type="email" name="email" id="">
</div>
<br> -->

<div>
<label for="title">Title of the Recette</label>
<input type="text" name='title' placeholder="Title of the Recipe">
</div>

<br>
<div>
<label for="date">Date</label>
<input type="date" name='date'>
</div>
<br>

<div>
<label for="description">Description</label>
<textarea type="textarea" rows="2" cols="25" name='description' placeholder="Add more details!"></textarea>
</div>
<br>

<input type="submit" name ="submit-repice" value="Send Recipe">

</form>

<?php
    $request = $bdd -> prepare('SELECT ID FROM people WHERE email= ?');
    $request -> execute([
        filter_var($_SESSION['email'], FILTER_SANITIZE_EMAIL),
    ]);
    $data = $request -> fetch();
    $idUser = $data['ID'];


    if (!empty($_POST['title']) and !empty($_POST['date']) AND !empty($_POST['description'])){

           
        $request = $bdd ->prepare('SELECT date FROM recipe WHERE date = ?');
        $request -> execute([
            $_POST['date']
         ]);

        $data = $request-> fetch();
    
            
        if(empty($data)){
            $request = $bdd -> prepare('INSERT INTO recipe (fk_id_user, title, date, description) VALUES (?, ?, ?, ?)');

            $request -> execute([
            $idUser,
            strip_tags(trim($_POST['title'])),
            strip_tags(trim($_POST['date'])),
            strip_tags(trim($_POST['description'])),
            ]);
            $request -> closeCursor();
        } else {
            echo "<p>Recipe already inserted for today. Try again tomorrow.</p>";
        } 
    }
    include 'table.php';
?>

