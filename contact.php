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
                    <h1>Technical Support</h1>
                    <p>You can contact our technical support for questions about your account or a trade issue. We will
                        answer your questions in the shortest time.</p>
                </article>

            </div>
        </div>

        <hr>


        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <form action="contact_form.php" method="post" class="contact-form">
                        <div id="basics">
                            <p><input type="text" name="name" placeholder="Name"></p>
                            <p><input type="text" name="email" placeholder="Email"></p>
                            <p><input type="text" name="steam" placeholder="Steam Account Link"></p>
                        </div>
                        <p><textarea name="message" placeholder="Your message"></textarea></p>
                        <p>
                            <button type="submit">Submit</button>
                        </p>
                    </form>
                </div>
                <div
                    class="col-lg-5 col-md-6 col-sm-12 col-xs-12  col-lg-offset-1  col-md-offset-0  col-sm-offset-0  col-xs-offset-0">
                    <div class="contact-right-img">
                        <img src="images/help.gif" alt="">
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