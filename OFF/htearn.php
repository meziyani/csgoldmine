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
                    <h1>How to earn Points ?</h1>
                    <br/>
                    <?php include "includes/steps2.php"; ?>
                </article>

            </div>

            <hr>

            <div class="panel panel-info">
                <div class="panel-heading"><b>Step 1 - Sign-in with your Steam Account</b></div>
                <div class="panel-body">Click on the "Sign-in through STEAM" button.
                    <br>
                    <img src="images/steps/step2.png">
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading"><b>Step 2 - Go to "Earn Points" and Select a Wall</b></div>
                <div class="panel-body">Go to the "<a href="points.php">Earn Points</a>" page.
                    <br>
                    <img src="images/steps/step1.png">
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading"><b>Step 3 - Select an Offer and Complete it</b></div>
                <div class="panel-body">Once you are on a Wall, you can see a list of offers.
                    <br>
                    Now, select an offer and follow the instructions to complete it.
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading"><b>Step 4 - Earn your Points</b></div>
                <div class="panel-body">When you got the offer completed, our system will credit your points balance/
                    <br>
                    This system will give you instantly your points, but sometimes it can takes a longer time.
                    <br>
                    If you are waiting for a long time your points, <a href="pointsproblem.php">check this pages</a>.
                </div>
            </div>


        </div>


    </div>

    <?php include "includes/footer.php"; ?>

</div>

<?php include "includes/foot.php"; ?>

</body>
</html>