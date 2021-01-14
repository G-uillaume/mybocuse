<?php
    $req = $bdd->prepare("SELECT p.first_name AS first_name, p.last_name AS last_name,a.day AS day, a.check_in AS check_in, a.check_out AS check_out
    FROM people AS p
    INNER JOIN attendance AS a
    ON p.ID = a.fk_id_user
    WHERE p.ID = ?");
    $req->execute([
        $_SESSION['id']
    ]);

    
?>
<section>
    <table class="table mx-auto">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Arrival Hour</th>
                <th scope="col">Departure Hour</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($data = $req->fetch()) {
                    ?>
                        <tr>
                            <td><?php echo date("l", strtotime($data['day'])) . "<br>" . implode("-", array_reverse(explode("-", $data['day']))); ?></td>
                            <td><?php echo explode(" ",$data['check_in'])[1]; ?></td>
                            <td><?php echo explode(" ",$data['check_out'])[1]; ?></td>

                        </tr>
                    <?php
                }
                ?>
            

        </tbody>

    </table>
</section>

<style>
table,
th,
td {
    border: solid 2px black;
    border-collapse: collapse;
    text-justify: center;
    text-align: center;
}
</style>