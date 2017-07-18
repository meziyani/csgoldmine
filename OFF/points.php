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
                    <h1>Earn Points</h1>
                </article>

            </div>
        </div>

        <hr>

        <div class="container centered">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#wallname1"><img src="images/trialpay.png" width="100"
                                                                               height="50" alt="TrialPay"></a></li>
                <li><a data-toggle="tab" href="#wallname2"><img src="images/trialpay.png" width="100" height="50"
                                                                alt="TrialPay"></a></li>
                <li><a data-toggle="tab" href="#wallname3"><img src="images/trialpay.png" width="100" height="50"
                                                                alt="TrialPay"></a></li>
            </ul>

            <div class="tab-content">
                <div id="wallname1" class="tab-pane fade in active">
                    <h3>Wall 1</h3>
                    <div class="jumbotron main-content">
                        <iframe src="http://offertoro.com/ifr/show/3145/<?= $_SESSION['steamid']; ?>/1776"
                                frameborder="0" width="1000" height="2400"></iframe>
                    </div>
                </div>
                <div id="wallname2" class="tab-pane fade">
                    <h3>Wall 2</h3>
                    <p>Coming soon</p>

                </div>
                <div id="wallname3" class="tab-pane fade">
                    <h3>Wall 3</h3>
                    <p>Coming soon</p>
                </div>
            </div>
        </div>

    </div>

    <?php include "includes/footer.php"; ?>

</div>

<?php include "includes/foot.php"; ?>

</body>
</html>