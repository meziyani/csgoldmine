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

    <!-- SUPPORT DELETE TICKET -->

    <?php

    if (isset($_GET["close"])) {

        try {

            $req = $db->query('SELECT id, steamid FROM support WHERE id="' . $_GET['id'] . '"');

        } catch (Exception $e) {

        }


        if ($donnees = $req->fetch()) {
            if ($donnees['steamid'] == $_SESSION['steamid']) {

                $req = $db->query('UPDATE `support` SET `active` = 0 WHERE `id` = \'' . $donnees['id'] . '\'');


            }
        }

    }

    ?>

    <!-- // SUPPORT DELETE TICKET -->


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
            <h3>Your Tickets</h3>
            <hr>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><b>Status</b></th>
                    <th><b>Message</b></th>
                    <th><b>Action</b></th>
                </tr>
                </thead>
                <tbody>


                <?php
                $req = $db->query('SELECT id, steamid, active, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM support WHERE steamid="' . $_SESSION['steamid'] . '" ORDER BY date_creation DESC LIMIT 0, 10');

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
                            Le <?= $donnees["date_creation_fr"] ?>
                        </td>
                        <td><a href="support.php?close=<?= $donnees["id"] ?>&id=<?= $donnees["steamid"] ?>" Close</td>
                    </tr>

                    <?php
                } // Fin de la boucle des billets
                $req->closeCursor();
                if ($nb == 0) {
                    ?>
                    <p style="text-align: center;"><b style="color:red;">You didn't yet send a Support ticket.</b></p>

                <?php }
                ?>

                </tbody>
            </table>

            <hr>
            <h3>Open a Ticket</h3>
            <hr>


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <form action="support_form.php" method="post" class="contact-form">
                        <p><textarea name="message" placeholder="Your message"></textarea></p>
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