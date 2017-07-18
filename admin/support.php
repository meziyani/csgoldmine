<?php include 'includes/header.php';


if (isset($_GET["close"])) {

    $req = $db->query('SELECT id, steamid FROM support WHERE id="' . $_GET['close'] . '"');

    $donnees = $req->fetch();
    if ($donnees['steamid']) {
        $req = $db->query('UPDATE `support` SET `active` = 0 WHERE `id` = \'' . $donnees['id'] . '\'');
    }


}

?>
    <style>
        textarea {
            width: 60%;
            height: 150px;
            border-width: medium;
        }
    </style>

    <div class="col-md-10">


        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Support</div>
                </div>
                <div class="content-box-large box-with-header">
                    <h1>Support Panel</h1>
                    <p>Here you can answers and manage the tickets.</p>
                    <br/>

<!--
                    <?php
/*                    if (isset($_GET["answer"])) {
                        */?>

                        <hr>
                        <h3>Answer to the ticket</h3>
                        <div width="100%">
                            <form width="100%" action="support_post.php" method="post" class="contact-form">
                                <p><textarea width="100%" name="message" placeholder="Your Answer for ticket n°<?/*=$_GET["answer"]*/?>"></textarea></p>
                                <p>
                                    <button type="submit">&nbsp;Send&nbsp;</button>
                                </p>
                            </form>
                        </div>

                        <hr>
                        --><?php
/*                    } */?>


                    <form action="support.php" method="get">
                        <label for="id"><h3>Search by Steam ID</h3>
                            <input type="text" name="id" id="id">
                        </label>
                        <button type="submit">Search</button>
                    </form>
                    <br/>


                    <div class="container">


                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="10"><b>Status</b></th>
                                <th width="600"><b>Message</b></th>
                                <th width="200"><b>Action</b></th>
                                <th width="190"><b>Steam ID</b></th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            if (!empty($_GET["searchid"])) {
                                $req = $db->query('SELECT id, steamid, active, message, DATE_FORMAT(date_creation, \'%m/%d/%Y at %H:%i\') AS date_creation_fr FROM support WHERE steamid="' . $_GET['searchid'] . '" ORDER BY !active, date_creation');
                            } else {
                                $req = $db->query('SELECT id, steamid, active, message, DATE_FORMAT(date_creation, \'%m/%d/%Y at %H:%i\') AS date_creation_fr FROM support ORDER BY !active, date_creation');
                            }


                            $nb = 0;

                            while ($donnees = $req->fetch()) {
                                $nb++;
                                ?>


                                <tr>

                                    <?php if ($donnees['active']) { ?>
                                        <td style="color: green">Active</td>
                                    <?php } else { ?>
                                        <td style="color: red">Resolved</td>
                                    <?php } ?>

                                    <td>
                                        <?php echo htmlspecialchars($donnees['message']); ?>
                                        <br>
                                        <?= $donnees["date_creation_fr"] ?>
                                    </td>
                                    <td>
                                        <a href="support.php?close=<?= $donnees["id"] ?>&id=<?= $donnees["steamid"] ?>">Close</a>
                                        |
                                        <a href="ticket.php?show=<?= $donnees["id"] ?>&id=<?= $donnees["steamid"] ?>">Show</a> |
                                        <a href='usermanager.php?steam_id=<?= $donnees["steamid"] ?>'>Profile</a>
                                    </td>
                                    <td>
                                        <a href='usermanager.php?steam_id=<?= $donnees["steamid"] ?>'><?= $donnees["steamid"] ?></a>
                                    </td>
                                </tr>

                                <?php
                            } // Fin de la boucle des billets
                            $req->closeCursor();
                            if ($nb == 0) {
                                ?>
                                <p style="text-align: center;"><b style="color:#e74c3c;">There is no active Support
                                        tickets for this user. (ID: <?= $_GET["searchid"] ?>)
                                    </b>
                                </p>

                            <?php }
                            ?>

                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>