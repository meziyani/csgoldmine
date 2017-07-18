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


    //Has his trade link
    $q = $db->prepare('SELECT * from users where steam_id=?');
    $q->execute([$steam_id]);
    $req = $q->fetch();
    if (empty($req['trade_url'])) {
        set_flash("You have to put your trade link before buying!", "warning");
        redirect("account.php");
    }

    //

    ?>

    <!-- Main -->
    <div id="main-wrapper" id="main">
        <div class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                    <h1>STORE</h1>
                    <p>Welcome to the Store, here you can buy some Keys against your points.</p>
                </article>

            </div>
        </div>
        <hr>
        <div class="container">
            <div id="products" class="row list-group">
                <?php

                $SQL = "SELECT * FROM store";
                $reponse = $db->query($SQL);
                while ($req = $reponse->fetch()) {
                    ?>
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <img class="group list-group-image"
                                 src="http://www.digiseller.ru/preview/57796/p1_50501131111420.JPG" alt=""/>
                            <div class="caption">
                                <hr>
                                <h4 class="group inner list-group-item-heading" style="text-align: center">
                                    <?php echo $req['title']; ?></h4>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            1200 <img src="images/coins.png"></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <a class="btn btn-success" href="order.php?id=<?php echo $req['id']; ?>">Buy
                                            this Key</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
        </div>


    </div>
    <?php include "includes/footer.php"; ?>

</div>

<?php include "includes/foot.php"; ?>

</body>
</html>