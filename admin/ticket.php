<?php include 'includes/header.php' ?>

    <style>
        textarea {
            width: 60%;
            height: 150px;
            border-width: medium;
        }
    </style>

    <div class="col-md-10">


        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Ticket Details</div>
                </div>
                <div class="content-box-large box-with-header">

                    <div class="container">

                        <hr>


                        <div class="row">
                            <div class="col-md-11">
                                <?php

                                if (isset($_GET["show"])) {

                                    $req = $db->query('SELECT id, steamid FROM support WHERE id="' . $_GET['show'] . '"');

                                    $get = $req->fetch();
                                    if ($get['steamid']) {
                                        $req = $db->query('UPDATE `support` SET `active` = 0 WHERE `id` = \'' . $get['id'] . '\'');


                                        $reqs = $db->query('SELECT id, steamid, active, message, DATE_FORMAT(date_creation, \'%m/%d/%Y at %H:%i\') AS date_creation_fr FROM support WHERE id="' . $_GET['show'] . '" ORDER BY date_creation');
                                        $msg = $reqs->fetch();

                                        ?>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th><b>By</b></th>
                                                <th><b>Message</b></th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <h3>Ticket nb. <?= $_GET["show"] ?></h3>
                                            <hr>


                                            <b>Status: </b>
                                            <?php if ($msg['active']) { ?>
                                                <text style="color: green">Active</text>
                                            <?php } else { ?>
                                                <text style="color: red">Resolved</text>
                                            <?php } ?>
                                            <br/>

                                            <b>Message:</b>
                                            <br/>
                                            <?php echo htmlspecialchars($msg['message']); ?>

                                            <br>
                                            <b>Date: </b><?= $msg["date_creation_fr"] ?>

                                            <hr>
                                            <h4>Answers:</h4>
                                            <br>

                                            <?php
                                            $req2 = $db->query('SELECT id, id_ticket, steamid, message, DATE_FORMAT(date_answer, \'%m/%d/%Y at %H:%i\') AS date_creation_fr, rank FROM support_answers WHERE id_ticket="' . $_GET['show'] . '" ORDER BY date_answer');

                                            $nb = 0;

                                            while ($donnees = $req2->fetch()) {
                                                $nb++;
                                                ?>


                                                <tr>

                                                    <?php if ($donnees['rank'] == 0) { ?>
                                                        <td style="color: #38887e">You</td>
                                                    <?php } else { ?>
                                                        <td style="color: #006e8b">Support</td>
                                                    <?php } ?>

                                                    <td>
                                                        <p>
                                                            <?php echo htmlspecialchars($donnees['message']); ?>
                                                        </p>
                                                        <br>
                                                        <?= $donnees["date_creation_fr"] ?>
                                                    </td>
                                                </tr>

                                                <?php
                                            } // Fin de la boucle des billets
                                            $req->closeCursor();
                                            if ($nb == 0) {
                                                ?>
                                                <p style="text-align: center;">
                                                    <b style="color:#e74c3c;">
                                                        No answers yet for this ticket.
                                                    </b>
                                                </p>

                                            <?php } ?>


                                            </tbody>
                                        </table>


                                        <hr>
                                        <h3>Answer to the Ticket</h3>
                                        <form action="answer_post.php" method="post">
                                            <p><textarea name="message" id="message"
                                                         placeholder="Your message"></textarea>
                                            </p>
                                            <p><input name="steamid" id="steamid" placeholder="Steam ID" hidden="true"
                                                      value="<?= $_GET["id"] ?>"></p>
                                            <p><input name="idt" id="idt" placeholder="Steam ID" hidden="true"
                                                      value="<?= $_GET["show"] ?>"></p>
                                            <p>
                                                <button type="submit">&nbsp;Send&nbsp;</button>
                                            </p>
                                        </form>
                                        <?php
                                    }
                                }

                                ?>
                            </div>
                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>