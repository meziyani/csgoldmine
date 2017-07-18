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

    <?php
    //Add new trade link and email to database
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
        if ($action == 1) {
            $trade_url = $_REQUEST['trade_url'];
            if (strpos($trade_url, 'steamcommunity.com') !== false) {
                $q = $db->prepare('UPDATE users SET trade_url = ? WHERE steam_id = ?');
                $q->execute([htmlspecialchars($trade_url), $_SESSION['steam_id']]);
            } else {
                set_flash("Invalid Trade Url!", "warning");
                redirect("account.php");
            }


        }

        if ($action == 2) {
            $email = $_REQUEST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $q = $db->prepare('UPDATE users SET email = ? WHERE steam_id = ?');
                $q->execute([htmlspecialchars($email), $_SESSION['steam_id']]);
            } else {
                set_flash("Invalid Email Address!", "warning");
                redirect("account.php");
            }


        }
    }

    ?>
    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                    <h1>Account Settings - <?php echo $steam_username; ?></h1>

                </article>

            </div>
        </div>

        <hr>


        <div class="container">
            <p>If administrators ask you, your steam id is:<?php echo $_SESSION['steam_id']; ?></p>

            <h3>Trade URL</h3>
            <p>You can find your Trade URL <a
                    href="https://steamcommunity.com/my/tradeoffers/privacy#trade_offer_access_url"
                    target="newpage">here</a></p>
            <form method="POST">
                <?php
                //Get email and trade url to place in placeholders
                $SQL = "SELECT * FROM users WHERE steam_id = '" . $_SESSION['steam_id'] . "'";
                $reponse = $db->query($SQL);
                $req = $reponse->fetch();

                $trade_url = $req['trade_url'];
                $email = $req['email'];

                ?>
                <input class="form-control" type="text" name="trade_url" placeholder="Enter your trade URL here"
                       value="<?php echo $trade_url; ?>">
                <p>Please also set both your profil and backpack privacy to public.</p>
                <p>If we dont have your trade url, you wont be able to recieve your purchases.</p>
                <input type="hidden" name="action" value="1">
                <input type="submit" class="btn btn-primary" value="Save">
            </form>
            <h3>Email Adress</h3>
            <p>Having your email address will make it easier for us to contact you in case there is a problem.</p>

            <form method="POST">

                <input class="form-control" type="text" name="email" placeholder="Enter email address here!"
                       value="<?php echo $email; ?>">
                <small>We do not give your email to no one!</small>
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