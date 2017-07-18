<div id="header-wrapper">
    <div id="header" class="container">


        <!-- Logo -->

        <h1 id="logo">
            <a href="index.php">
                <img src="images/gold_mine.png" width="9%" height="9%"> CS:GOLDMINE <img src="images/gold_mine.png"
                                                                                         width="9%" height="9%">
            </a>
        </h1>
        <p>
        <h3>Get FREE CS:GO Keys ! QUICK, EASY and FREE - 24H DELIVERY</h3>
        </p>
        <!-- Nav -->
        <nav id="nav">
            <ul class="centered">
                <li><a class="icon fa-home" href="./"><span>Home</span></a></li>
                <li><a class="icon fa-money" href="points.php"><span>Earn Points</span></a></li>
                <li><a class="icon fa-shopping-basket" href="store.php"><span>Store</span></a></li>
                <!--<li><a class="icon fa-share-alt" href=""><span>Referrals</span></a></li>-->
                <li>
                    <a href="#" class="icon fa-question"><span>Help</span></a>
                    <ul>
                        <li><a href="htearn.php">How to earn points</a></li>
                        <li><a href="pointsproblem.php">Got a Points problem</a></li>
                        <li><a href="support.php">Support</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </li>

                <?php


                if (!isset($_SESSION['steamid'])) {
                    loginbutton();
                } else {
                    include 'steamauth/userInfo.php';
                    $steam_id = $steamprofile['steamid'];
                    $steam_username = $steamprofile['personaname'];
                    $steam_profileurl = $steamprofile['profileurl'];
                    $steam_status = $steamprofile['personastate'];
                    $steam_avatar_little = $steamprofile['avatar'];
                    $steam_avatar_medium = $steamprofile['avatarmedium'];

                    // On verifie si l'utilisateur n'est pas déjà dans la base de données
                    $SQL = "SELECT COUNT(*) FROM users WHERE steam_id = '$steam_id'";
                    $reponse = $db->query($SQL);
                    $req = $reponse->fetch();

                    if ($req[0] == 0) {
                        // Il n'existe pas on l'enregistre
                        $SQL = "INSERT INTO users VALUES ('','$steam_id','$steam_username','$steam_avatar_little','$steam_avatar_medium','$steam_profileurl','','$steam_status','','','',0,'" . $_SERVER['REMOTE_ADDR'] . "','')";
                        $db->beginTransaction();
                        $db->query($SQL);
                        $db->commit();

                        $_SESSION['steam_id'] = $steam_id;
                        $_SESSION['avatar'] = $steam_avatar_little;
                        $_SESSION['username'] = $steam_username;
                        $_SESSION['profileurl'] = $steam_profileurl;
                    } else {
                        // On check s'il est pas banni et  on récupère ses point pour le menu
                        $SQL = "SELECT * FROM users WHERE steam_id = '$steam_id'";
                        $reponse = $db->query($SQL);
                        $req = $reponse->fetch();
                        $points = $req['points'];
                        $status = $req['status'];
                        $rank = $req['rank'];

                        if ($status == 1) {
                            // Mr est banni on le log pas
                            session_unset();
                            session_destroy();
                            set_flash("This account has been banned!", "danger");


                        } else {

                            // Il existe on ne fait rien on update c'est tout
                            $SQL = "UPDATE users SET steam_status = '$steam_status' WHERE steam_id = '$steam_id'";
                            $db->query($SQL);

                            $SQL = "UPDATE users SET last_connexion = NOW() WHERE steam_id = '$steam_id'";
                            $db->query($SQL);

                            $SQL = "UPDATE users SET username = '$steam_username' WHERE steam_id = '$steam_id'";
                            $db->query($SQL);

                            // On update l'ip de l'utilisateur
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $SQL = "UPDATE users SET ip = '$ip' WHERE steam_id = '$steam_id'";
                            //echo $SQL;
                            $db->query($SQL);

                            $_SESSION['steam_id'] = $steam_id;
                            $_SESSION['avatar'] = $steam_avatar_little;
                            $_SESSION['username'] = $steam_username;
                            $_SESSION['profileurl'] = $steam_profileurl;

                        }
                    }

                    if (!isset($_SESSION['steamid'])) {
                        loginbutton();
                    } else {
                        ?>
                        <li>
                            <a href="#" class="icon fa-steam">
                                <img
                                    src="<?php echo $_SESSION['avatar']; ?>"
                                    height="16" width="16" alt="">
                                <!-- System caught you editing the page using the inspector, if you edit your points you will get banned here and on Steam. -->
                                <small><?php echo $_SESSION['username']; ?> | <img src="images/coins.png" height="24"
                                                                                   width="24"
                                                                                   alt="Points"> <?php echo $points; ?>
                                </small>

                            </a>
                            <ul>
                                <li><a href="account.php">Account Settings</a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <?php
                                if ($rank == 1) {
                                    echo '<li><a href="admin">Admin Panel</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
                <!--
                <li>
                    <a href="#" class="icon fa-steam">

                        <img
                            src="https://steamcdn-a.akamaihd.net/steamcommunity/public/includes/avatars/08/#STEAMID#a_medium.jpg"
                            height="16" width="16" alt="">
                        <!-- System caught you editing the page using the inspector, if you edit your points you will get banned here and on Steam. --><!--
                        <small>#STEAMNAME# | <img src="includes/coins.png" height="24" width="24" alt="Points"> 3659
                        </small>

                    </a>
                    <ul>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>-->
            </ul>
            <?php if (isset($_SESSION['notification']['message'])): ?>

                <div class="alert alert-<?= $_SESSION['notification']['type']; ?>">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $_SESSION['notification']['message']; ?>
                </div>

                <?php
                $_SESSION['notification'] = [];endif; ?>
    </div>

    <ul class="actions">
        <a href="#TEST" class="button btn-small" data-toggle="modal" data-target="#giveawayModal">
            <img
                src="https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJf1fLEcjVL49KJlYG0kfbwNoTdn2xZ_IsgjuuX94-k2lLgqUdlZW70doWWcgU2YwvTr1Tvl-zu05K66J2ayHBnpGB8ssznNkyW/200fx200f"
                width="40" height="40" alt="Giveaway">

            Click to Join the Giveaway and win a Falchion Knife

            <img
                src="https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJf1fLEcjVL49KJlYG0kfbwNoTdn2xZ_IsgjuuX94-k2lLgqUdlZW70doWWcgU2YwvTr1Tvl-zu05K66J2ayHBnpGB8ssznNkyW/200fx200f"
                width="40" height="40" alt="Giveaway">
        </a>
    </ul>

    </nav>


</div>
</div>


<div class="modal fade" id="giveawayModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="text-align: center">
            <div class="modal-header" style="background-color: #ceffc2">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">

                    <i class="icon fa-star-o"></i> Join our Free Giveaway
                    <i class="icon fa-star-o"></i>

                </h3>

            </div>
            <div class="modal-body" style="background-color: #fbffff">

                <img src="http://cdn.mos.cms.futurecdn.net/0251a68aac5cbe5430e3de628cd2d08e-650-80.jpg"
                     class="img-rounded"
                     width="100%" height="100%">

                <br>
                <br>

                <button type="button" class="button">
                    <span>Click to join the Giveaway</span>
                </button>
            </div>
            <div class="modal-footer" style="background-color: #ceffc2">
                <button type="button" class="button" data-dismiss="modal">
                    <span>Close</span>
                </button>
            </div>
        </div>

    </div>
</div>
