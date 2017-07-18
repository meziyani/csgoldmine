<?php
require ('steamauth/userInfo.php');
?>
<?php include 'includes/header.php' ?>
<?php

if(!empty($_GET['steam_id'])) {

    $q = $db->prepare('SELECT COUNT(*) as count FROM users WHERE steam_id = ?');
    $q->execute([$_GET['steam_id']]);
    $req = $q->fetch();
    if($req['count'] == 1){


        //Admin rank
        if(isset($_GET['rank'])) {
            if ($_GET['rank'] == 1) {
                $q = $db->prepare('UPDATE users SET rank=? where steam_id=?');
                $q->execute([1, $_GET['steam_id']]);
            }
            if ($_GET['rank'] == 0) {
                $q = $db->prepare('UPDATE users SET rank=? where steam_id=?');
                $q->execute([0, $_GET['steam_id']]);
            }
        }
        //Set Banned
        if(isset($_GET['status'])) {
            if ($_GET['status'] == 0) {
                $q = $db->prepare('UPDATE users SET status=? where steam_id=?');
                $q->execute([0, $_GET['steam_id']]);
            }
            if ($_GET['status'] == 1) {
                $q = $db->prepare('UPDATE users SET status=? where steam_id=?');
                $q->execute([1, $_GET['steam_id']]);
            }
        }

        //Get users information after modifications are done
        $q = $db->prepare('SELECT * from users WHERE steam_id=?');
        $q->execute([$_GET['steam_id']]);
        $userInfo = $q->fetch();
    }
    }

    

?>
    <div class="col-md-10">


        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">User Manager</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                    <?php if(!isset($userInfo)){?>
                    <form method="get" action="usermanager.php">
                        <div class="form-group">
                            <label for="steam_id">Steam Id</label>
                            <input type="text" class="form-control" id="steam_id" aria-describedby="steam_id" name="steam_id" placeholder="Enter steam id">

                        </div>
                    </form>
                        <h3>All Users</h3>
                        <small>Rank (1 = Admin, 0 = User)</small><br>
                        <small>Status (1 = Banned, 0 = Not Banned)</small><br>
                        <small>Note: Click on a user's avatar to see his profile</small>
                    <table class="jumbotron table table-striped table-ranking">
                        <tr>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Steam Id</th>
                            <th>Last Connexion</th>
                            <th>Rank</th>
                            <th>Status</th>
                            <th>Points</th>
                            <th>Ip</th>
                        </tr>


                        <?php
                        $SQL = "SELECT * FROM users";
                        $reponse = $db->query($SQL);
                        while ($req = $reponse->fetch()) {
                            echo '<tr>'.'<td>'.'<a href="?steam_id='.$req['steam_id'].'">'.'<img src="'.$req['avatar_little'].'" /></a></td>'.'<td>'.$req['username'].'</td>'.'<td>'.$req['steam_id'].'</td>'.'<td>'.$req['last_connexion'].'</td>'.'<td>'.$req['rank'].'</td>'.'<td>'.$req['status'].'</td>'.'<td>'.$req['points'].'</td>'.'<td>'.$req['ip'].'</td>'.'</tr>';
                        }
                        ?>
                    </table>
                    <?php }else{?>
                        <div class="jumbotron" align="center">
                        <img class="glow2 img-rounded" src="<?php echo $userInfo['avatar_medium']?>" alt="" style="margin: 27px 0 0 0">
                        <h3 align="center"><?php echo $userInfo['username']?></h3>
                        </div>



                        <h3>User Info</h3>
                        <table class="jumbotron table table-striped table-ranking">
                            <tbody>

                            </tr>
                            <tr>
                                <th>Steam Id</th>
                                <td><?php echo $userInfo['steam_id']?></td>
                            </tr>
                            <tr>
                                <th>Last Connexion</th>
                                <td><?php echo $userInfo['last_connexion']?></td>
                            </tr>
                            <tr>
                                <th>Points</th>
                                <td><?php echo $userInfo['points']?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php
                                    if($userInfo['status'] == 1) {
                                        echo '<a href="?status=0&steam_id='.$userInfo['steam_id'].'" class="btn btn-danger">' . 'Banned' . '</a>';
                                    }else{
                                        echo '<a href="?status=1&steam_id='.$userInfo['steam_id'].'" class="btn btn-success">' . 'Not Banned' . '</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Rank</th>
                                <td><?php
                                    if($userInfo['rank'] == 1) {
                                        echo '<a href="?rank=0&steam_id='.$userInfo['steam_id'].'" class="btn btn-success">' . 'Admin' . '</a>';
                                    }else{
                                        echo '<a href="?rank=1&steam_id='.$userInfo['steam_id'].'" class="btn btn-warning">' . 'User' . '</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $userInfo['email']?></td>
                            </tr>
                            <tr>
                                <th>Trade Link</th>
                                <td><?php echo $userInfo['trade_url']?></td>
                            </tr>
                            <tr>
                                <th>Ip</th>
                                <td><?php echo $userInfo['ip']?></td>
                            </tr>



                            </tbody>
                        </table>
                        <h3>Transactions</h3>
                        <table class="table-bordered">
                            <thead>
                            <tr>
                                <th>SteamID</th>
                                <th>ItemID</th>
                                <th>Item Name</th>
                                <th>Date</th>
                                <th>Balance Before</th>
                                <th>Balance After</th>
                                <th>Price</th>
                                <th>Ip</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <?php
                            $steam_id = $userInfo['steam_id'];
                            $SQL = "SELECT * FROM transactions where steam_id='$steam_id'";
                            $reponse = $db->query($SQL);
                            while ($req = $reponse->fetch()) {
                                $q = $db->prepare('SELECT * from users where steam_id=?');
                                $q->execute([$req['steam_id']]);
                                $user_info = $q->fetch();
                                if ($req['item_recieved'] == 1) {
                                    echo '<tr><td><a href="' . $user_info['trade_url'] . '">' . $req['steam_id'] . '</td></a><td>' . $req['item_id'] . '</td><td>' . $req['item_title'] . '</td><td>' . $req['date'] . '</td><td>' . $req['balance_before'] . '</td><td>' . $req['balance_after'] . '</td><td>' . $req['price'] . '</td><td>' . $req['ip'] . '</td><td class="">' . 'Completed' . '</td></tr>';
                                } else {

                                    echo '<tr><td><a href="' . $user_info['trade_url'] . '">' . $req['steam_id'] . '</td></a><td>' . $req['item_id'] . '</td><td>' . $req['item_title'] . '</td><td>' . $req['date'] . '</td><td>' . $req['balance_before'] . '</td><td>' . $req['balance_after'] . '</td><td>' . $req['price'] . '</td><td>' . $req['ip'] . '</td><td class="">' . 'Uncompleted' . '</td></tr>';
                                }

                            }
                            ?>

                        </table>

                    <?php }?>

                    <br/><br/>
                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>