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
    <div class="container">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                    <h1>Earn Points</h1>
                </article>

            </div>
        </div>

        <hr>

        <div id="main-wrapper">

            <div class="container centered">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#wallname1">
                            <img src="images/OfferToro.png" height="48" alt="OfferToro"></a>
                    </li>
                    <li><a data-toggle="tab" href="#wallname2">
                            <img src="https://adscendmedia.com/framework/public/packages/adscend/images/logo.svg"
                                 height="48" alt="OfferToro"></a>
                    </li>
                    <li><a data-toggle="tab" href="#wallname3">
                            <img src="images/adgate.png" height="48" alt="OfferToro"></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="wallname1" class="tab-pane fade in active">
                        <div class="jumbotron main-content">
                            <div class="row">

                                <div class="col-md-8">
                                    <iframe
                                        src="http://offertoro.com/ifr/show/3145/<?= $_SESSION['steamid']; ?>/1776"
                                        frameborder="0" width="100%" height="1000"></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe src="includes/feed.php" height="1000"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wallname2" class="tab-pane fade">
                        <div class="jumbotron main-content">
                            <div class="row">

                                <div class="col-md-8">
                                    <iframe
                                        src="https://adscendmedia.com/adwall/publisher/106819/profile/7007?subid1=<?= $_SESSION['steamid']; ?>"
                                        frameborder="0"
                                        width="100%" height="1000" ></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe src="includes/feed.php" height="1000"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wallname3" class="tab-pane fade">
                        <div class="jumbotron main-content">
                            <div class="row">

                                <div class="col-md-8">
                                    <iframe src="http://wall.adgaterewards.com/oa6a/<?= $_SESSION['steamid']; ?>"
                                            frameborder="0" width="100%" height="1000"></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe src="includes/feed.php" height="1000"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include "includes/footer.php"; ?>

    </div>

    <?php include "includes/foot.php"; ?>

</body>
</html>