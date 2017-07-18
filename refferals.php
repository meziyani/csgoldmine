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

    <?php
    is_logged_in();
    include("includes/header.php"); ?>

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
            <div class="container">
                <div class="process">
                    <div class="process-row">
                        <div class="process-step">
                            <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i
                                    class="fa fa-link fa-3x"></i></button>
                            <p style="text-align: center"><b>Sahre your link</b></p>
                        </div>
                        <div class="process-step">
                            <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i
                                    class="fa fa-image fa-3x"></i></button>
                            <p style="text-align: center"><b>Your affiliate wins 10 Points</b></p>
                        </div>
                        <div class="process-step">
                            <button type="button" class="btn btn-success btn-circle" disabled="disabled"><i
                                    class="fa fa-gift fa-3x"></i></button>
                            <p style="text-align: center"><b>You earn 10 Points</b></p>
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger"><p align="center"><b>WARNING!</b> Double accounts are strictly forbidden
                        so you will automatically get banned if you are trying to use double accounts.</p>
                </div>
            </div>
            <h3>Affiliation URL</h3>
            <p>Share this URL with your friends to be rewarded !</p>
            <input class="form-control" type="text" name="trade_url"
                   disabled="disabled"
                   value="http://srv1.oneprod.eu/csgoldmine/?refid=<?php echo $_SESSION["steamid"]; ?>">
        </div>


    </div>

    <?php include "includes/footer.php"; ?>

</div>

<?php include "includes/foot.php"; ?>

</body>
</html>