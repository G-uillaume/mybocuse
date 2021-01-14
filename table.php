<table style="width:50%">
  <tr>
    <th>Owner</th>
    <th>Title</th>
    <th>Date</th>
    <th>Description</th>
  </tr>
<?php
include('includes/secret.php');
try {
    $bdd = new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}


    $request = $bdd -> query('SELECT recipes.title AS title, recipes.date AS date, recipes.description AS description, people.first_name AS first_name FROM recipes 
    INNER JOIN people ON people.ID = recipes.fk_id_user');

    $arr = [];
    
    while ($data = $request -> fetch()){
      echo "ola<br>";
        array_push($arr, $data);
        echo "<tr> 
        <td>" . $data['first_name'] . "</td> 
        <td>" . $data['title'] . "</td>
        <td>" . $data['date'] . "</td>
        <td>" . $data['description'] . "</td> 
        </tr>";
    }
?>
</table>
