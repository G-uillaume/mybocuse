<?php
    $request = $bdd -> query('SELECT recipes.title AS title, recipes.date AS date, recipes.description AS description, people.first_name AS first_name FROM recipes 
    INNER JOIN people ON people.ID = recipes.fk_id_user ORDER BY recipes.date DESC LIMIT 4');

    $arr = [];
    
    while ($data = $request -> fetch()){
        array_push($arr, $data);
    }
?>

<table class="table mx-auto">
    <thead>
        <tr class="jourSemaine">
                <th scope="col"></th>
            <?php
                for ($i = 0; $i < count($arr); $i++) {
                    ?>
                    <th scope="col"><?php echo date("l", strtotime($arr[$i]['date'])) . "<br>" . implode("-", array_reverse(explode("-", $arr[$i]['date']))); ?> </th>
                    <?php
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">First name</th>
            <?php
                for ($i = 0; $i < count($arr); $i++) {
                    ?>
                    <td><?php echo $arr[$i]['first_name']; ?> </td>
                    <?php
                }
            ?>
        </tr>

        <tr>
            <th scope="row">Title</th>
            <?php
                for ($i = 0; $i < count($arr); $i++) {
                    ?>
                    <td><?php echo $arr[$i]['title']; ?> </td>
                    <?php
                }
            ?>
        </tr>

    </tbody>

</table>