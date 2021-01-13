<table style="width:50%">
  <tr>
    <th>Owner</th>
    <th>Title</th>
    <th>Date</th>
    <th>Description</th>
  </tr>
<?php

    $request = $bdd -> prepare('SELECT recipe.title AS title, recipe.date AS date, recipe.description AS description, people.first_name AS first_name FROM recipe 
    INNER JOIN people ON people.ID = recipe.fk_id_user
    WHERE people.ID = ?');

    $request -> execute([
        $idUser
    ]);

    while ($data = $request -> fetch()){
        echo "<tr> 
        <td>" . $data['first_name'] . "</td> 
        <td>" . $data['title'] . "</td>
        <td>" . $data['date'] . "</td>
        <td>" . $data['description'] . "</td> 
        </tr>";
    }

?>
</table>