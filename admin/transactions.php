<?php

?>
<?php include 'includes/header.php' ?>
<?php
if (!empty($_GET['setcompleted'])) {
    $q = $db->prepare('UPDATE transactions SET item_recieved=? where id=?');
    $q->execute([1, $_GET['setcompleted']]);
}
if (!empty($_GET['setuncompleted'])) {
    $q = $db->prepare('UPDATE transactions SET item_recieved=? where id=?');
    $q->execute([0, $_GET['setuncompleted']]);
}

?>
    <div class="col-md-10">


        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Transaction List</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">

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

                        $SQL = "SELECT * FROM transactions";
                        $reponse = $db->query($SQL);
                        while ($req = $reponse->fetch()) {
                            $q = $db->prepare('SELECT * from users where steam_id=?');
                            $q->execute([$req['steam_id']]);
                            $user_info = $q->fetch();
                            if ($req['item_recieved'] == 1) {
                                echo '<tr><td><a target="_blank" href="' . $user_info['trade_url'] . '">' . $req['steam_id'] . '</td></a><td>' . $req['item_id'] . '</td><td>' . $req['item_title'] . '</td><td>' . $req['date'] . '</td><td>' . $req['balance_before'] . '</td><td>' . $req['balance_after'] . '</td><td>' . $req['price'] . '</td><td>' . $req['ip'] . '</td><td class="">' . '<a class="btn btn-large"href="?setuncompleted=' . $req['id'] . '">Completed</a>' . '</td></tr>';
                            } else {

                                echo '<tr><td><a target="_blank" href="' . $user_info['trade_url'] . '">' . $req['steam_id'] . '</td></a><td>' . $req['item_id'] . '</td><td>' . $req['item_title'] . '</td><td>' . $req['date'] . '</td><td>' . $req['balance_before'] . '</td><td>' . $req['balance_after'] . '</td><td>' . $req['price'] . '</td><td>' . $req['ip'] . '</td><td class="">' . '<a class="btn btn-large"href="?setcompleted=' . $req['id'] . '">Uncompleted</a>' . '</td></tr>';
                            }

                        }
                        ?>

                    </table>
                    <br/><br/>
                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>