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

    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                    <h1>Refferals</h1>

                </article>

            </div>
        </div>

        <hr>


        <div class="container">


            <h3>Affiliation URL</h3>
            <p>Share this URL with your friends to be rewarded !</p>
            <form method="POST">
                <?php

                $SQL = "SELECT * FROM users WHERE steam_id = '" . $_SESSION['steam_id'] . "'";
                $reponse = $db->query($SQL);
                $req = $reponse->fetch();

                $trade_url = $req['trade_url'];
                $email = $req['email'];

                ?>
                <input class="form-control" type="text" name="trade_url" placeholder="Enter your trade URL here"
                       value="<?php echo $trade_url; ?>">
                <p>Please also set both your profil and backpack privacy to public.</p>
                <input type="hidden" name="action" value="1">
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
            <h3>Email Adress</h3>
            <p>Having your email address will make it easier for us to contact you.</p>
            <form method="POST">

                <input class="form-control" type="text" name="email" placeholder="Enter email address here!"
                       value="<?php echo $email; ?>">
                <input type="hidden" name="action" value="2"><br/>
                <input type="submit" class="btn btn-primary" value="Save">
            </form>


        </div>


    </div>

    <?php include "includes/footer.php"; ?>

</div>

<?php include "includes/foot.php"; ?>

</body>
</html>