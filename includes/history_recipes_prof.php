<?php
    if (!empty($_GET['promo'])) {
        $request = $bdd -> prepare('SELECT recipes.title AS title, recipes.date AS date, recipes.description AS description, people.first_name AS first_name, people.last_name AS last_name FROM recipes 
        INNER JOIN people ON people.ID = recipes.fk_id_user 
        WHERE people.promo = ? ORDER BY recipes.date DESC');
        $request->execute([
            $_GET['promo']
        ]);
    } else {
        $request = $bdd -> query('SELECT recipes.title AS title, recipes.date AS date, recipes.description AS description, people.first_name AS first_name, people.last_name AS last_name FROM recipes 
        INNER JOIN people ON people.ID = recipes.fk_id_user ORDER BY recipes.date DESC');
    }

    $arr = [];
    
    while ($data = $request -> fetch()){
        array_push($arr, $data);
    }
?>
<table class='tableREcipe table'>
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Title</th>
            <th>Recipe</th>
        </tr>
    </thead>
    <tbody> 
        
    <?php
                for ($i = 0; $i < count($arr); $i++) {
                    
                    
                        ?>
                        <tr scope="col">
                            <?php 
                            
                            echo "<td>".date("l", strtotime($arr[$i]['date'])) . "<br>" . implode("-", array_reverse(explode("-", $arr[$i]['date'])))."</td>";

                            echo "<td>".$arr[$i]['first_name']. " ".$arr[$i]['last_name']."</td>";

                            echo "<td>".$arr[$i]['title']."</td>";

                            echo "<td>".$arr[$i]['description']."</td>";
                            
                            ?> 
                        </tr>
                        <?php  
                }
            ?>
            
    </tbody>
</table>