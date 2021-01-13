<script src="https://kit.fontawesome.com/9be8d195b1.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<section>
    <div class=container>
        <?php
            // $req = $bdd->prepare("SELECT first_name, last_name, email FROM people WHERE ID = ?");
            // $req->execute([
            //     $_SESSION['id']
            // ]);
            // $data = $req->fetch();
        ?>
        <div>
            <div class="row">
                <div class="col-sm">
                    <h3>
                        <img height="100px"
                            src="https://avatars3.githubusercontent.com/u/45150822?u=fc54c2bf6aa021c3d61212f54c229dc1596d58cf&v=4"
                            alt="pp">
                        &nbsp;
                        <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
                    </h3>
                </div>
            </div>
        </div>

        <div>
            <div class="row">
                <div class="col-sm-12">
                    <dl class="row">

                        <dt class="col-sm-3">Firstname</dt>
                        <dd class="col-sm-9"><?php echo $_SESSION['first_name']; ?></dd>

                        <dt class="col-sm-3">Lastname</dt>
                        <dd class="col-sm-9"><?php echo $_SESSION['last_name']; ?></dd>

                        <dt class="col-sm-3">E-mail</dt>
                        <dd class="col-sm-9"><?php echo $_SESSION['email']; ?></dd>

                    </dl>
                </div>
                <button type="button" class="btn btn-dark" style="width: 250px;" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark" style="width: 250px;">Save changes</button>

            </div>

        </div>
    </div>

</section>

<style>
section {

    background-image: linear-gradient(90deg, rgb(255, 255, 255) 0%, transparent 66%), repeating-linear-gradient(45deg, rgba(114, 114, 114, 0.08) 0px, rgba(114, 114, 114, 0.08) 1px, transparent 1px, transparent 16px), repeating-linear-gradient(90deg, rgba(114, 114, 114, 0.08) 0px, rgba(114, 114, 114, 0.08) 1px, transparent 1px, transparent 16px), repeating-linear-gradient(135deg, rgba(114, 114, 114, 0.08) 0px, rgba(114, 114, 114, 0.08) 1px, transparent 1px, transparent 16px), linear-gradient(0deg, rgb(255, 255, 255), rgb(255, 255, 255));
}
</style>