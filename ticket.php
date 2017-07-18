<!DOCTYPE HTML>
<!--
	CS:GOLDMINE |
-->
<html>

<head>
    <title>CS:GOLDMINE</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <?php include("includes/head.php"); ?>

</head>
<body class="homepage">


<div id="page-wrapper">

    <!-- Header -->

    <?php include("includes/header.php"); ?>
    <?php
    //Check if user is logged in
    is_logged_in();
    ?>


    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                    <h1>SUPPORT</h1>
                    <p>You can contact our technical support for questions about your account or a trade
                        issue. We will answer your questions in the shortest time.</p>
                </article>

            </div>
        </div>


        <div class="container">

            <hr>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th><b>By</b></th>
                    <th><b>Message</b></th>
                </tr>
                </thead>
                <tbody>

                <?php

                if (isset($_GET["show"])) {

                    $req = $db->query('SELECT id, steamid FROM support WHERE id="' . $_GET['show'] . '"');

                    $get = $req->fetch();
                    if ($get['steamid'] == $_SESSION['steamid']) {
                        $req = $db->query('UPDATE `support` SET `active` = 0 WHERE `id` = \'' . $get['id'] . '\'');


                        $reqs = $db->query('SELECT id, steamid, active, message, DATE_FORMAT(date_creation, \'%m/%d/%Y at %H:%i\') AS date_creation_fr FROM support WHERE id="' . $_GET['show'] . '" ORDER BY date_creation');
                        $msg = $reqs->fetch();

                        ?>


                        <h3>Your Ticket nb. <?= $_GET["show"] ?></h3>
                        <hr>


                        <b>Status:</b>
                        <?php if ($msg['active']) { ?>
                            <text style="color: green">Active</text>
                        <?php } else { ?>
                            <text style="color: red">Resolved</text>
                        <?php } ?>
                        <br/>

                        <p>
                            <b>Message:</b>
                            <br/>
                            <?php echo htmlspecialchars($msg['message']); ?>
                            <br>
                            <b>Date: </b><?= $msg["date_creation_fr"] ?>
                        </p>

                        <hr>
                        <h4>Answers:</h4>
                        <br>

                        <?php
                        $req2 = $db->query('SELECT id, id_ticket, steamid, message, DATE_FORMAT(date_answer, \'%m/%d/%Y at %H:%i\') AS date_creation_fr, rank FROM support_answers WHERE id_ticket="' . $_GET['show'] . '" ORDER BY date_answer');

                        $nb = 0;

                        while ($donnees = $req2->fetch()) {
                            $nb++;
                            ?>


                            <tr>

                                <?php if ($donnees['rank'] == 0) { ?>
                                    <td style="color: #38887e">You</td>
                                <?php } else { ?>
                                    <td style="color: #006e8b">Support</td>
                                <?php } ?>

                                <td>
                                    <?php echo htmlspecialchars($donnees['message']); ?>
                                    <br>
                                    <?= $donnees["date_creation_fr"] ?>
                                </td>
                            </tr>

                            <?php
                        } // Fin de la boucle des billets
                        $req->closeCursor();
                        if ($nb == 0) {
                            ?>
                            <p style="text-align: center;"><b style="color:#e74c3c;">No answers yet for this ticket.</b>
                            </p>

                        <?php }
                    }
                }

                ?>
                </tbody>
            </table>


            <hr>
            <h3>Answer to the Ticket</h3>
            <hr>


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <form action="./answer_post.php" method="post" class="contact-form">
                        <p><textarea name="message" id="message" placeholder="Your message"></textarea></p>
                        <input name="steamid" id="steamid" placeholder="Steam ID" hidden="true"
                               value="<?= $_GET["id"] ?>">
                        <input name="idt" id="idt" placeholder="Steam ID" hidden="true" value="<?= $_GET["show"] ?>">
                        <p>
                            <button type="submit">&nbsp;Send&nbsp;</button>
                        </p>
                    </form>
                </div>
                <div
                    class="col-lg-5 col-md-6 col-sm-12 col-xs-12  col-lg-offset-1  col-md-offset-0  col-sm-offset-0  col-xs-offset-0">
                    <div class="contact-right-img">
                        <img style="margin-top: -5em" src="images/support.png" alt="">
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

<?php include "includes/footer.php"; ?>


<?php include "includes/foot.php"; ?>

</body>
</html>