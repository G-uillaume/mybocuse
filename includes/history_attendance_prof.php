<table class="tableCheck table">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                            </tr>


                        </thead class="jourSemaine">
                        <tbody>
                        <?php
                            if (!empty($_GET['promo'])) {
                                $req = $bdd->prepare("SELECT p.first_name AS first_name, p.last_name AS last_name,a.day AS day, a.check_in AS check_in, a.check_out AS check_out
                                FROM people AS p
                                INNER JOIN attendance AS a
                                ON p.ID = a.fk_id_user
                                WHERE p.promo = ?");
                                $req->execute([strip_tags(trim($_GET['promo']))]);
                            } else {
                                $req = $bdd->query("SELECT p.first_name AS first_name, p.last_name AS last_name,a.day AS day, a.check_in AS check_in, a.check_out AS check_out
                                FROM people AS p
                                INNER JOIN attendance AS a
                                ON p.ID = a.fk_id_user");
                            }
                                while ($data = $req->fetch()) {
                                    echo "<tr>";
                                    echo "<td>".$data['first_name'] . " " . $data['last_name']."</td>";
                                    echo "<td>".implode("-", array_reverse(explode("-", $data['day'])))."</td>";
                                    echo "<td>".explode(" ",$data['check_in'])[1]."</td>";
                                    if ($data['check_out']) {
                                        echo "<td>".explode(" ",$data['check_out'])[1]."</td>";
                                    }
                                    echo "</tr>";
                                }
                            
                        ?>
                        </tbody>
                    </table>