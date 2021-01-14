<?php
    if (!empty($_POST['title']) and !empty($_POST['date']) AND !empty($_POST['description'])){

           
        $request = $bdd ->prepare('SELECT date FROM recipes WHERE date = ?');
        $request -> execute([
            $_POST['date']
         ]);

        $data = $request-> fetch();
    
            
        if(empty($data)){
            $request = $bdd -> prepare('INSERT INTO recipes (fk_id_user, title, date, description) VALUES (?, ?, ?, ?)');

            $request -> execute([
            $_SESSION['id'],
            strip_tags(trim($_POST['title'])),
            strip_tags(trim($_POST['date'])),
            strip_tags(trim($_POST['description'])),
            ]);
            $request -> closeCursor();
        } else {
            echo "<p>Recipe already inserted for today. Try again tomorrow.</p>";
        } 
    }
?>
<section>
    <form style="margin:30px 0px 0px 30px;" method="post" action="">

        <div class="mb-3">
            <label  class="form-label">Titre</label>
            <input type="text" name="title" placeholder="Ex: la tarte au fraise" class="form-control">
        </div>

        <div class="mb-3">
            <label  class="form-label">Description </label>
            <input type="text" name="description" placeholder="" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" placeholder="Ex: paulsernine@gmail.com" class="form-control">
        </div>

        <form method="post">
                <input type="submit" name="valider" value="Valider" class="btn btn-dark">

        </form>
    </form>
</section>