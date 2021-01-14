<script src="https://kit.fontawesome.com/9be8d195b1.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<section>
    <div class=container>
        <div>
            <div class="row">
                <div class="col-sm">
                    <h3>

                        <img class="imgProfile" height="100px"
                            src="./includes/media/student.svg"
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

            </div>

        </div>
    </div>

</section>
