<?php

function set_flash($message, $type = 'info')
{
    $_SESSION['notification']['message'] = $message;
    $_SESSION['notification']['type'] = $type;
}

include 'includes/header.php';

?>
    <div class="col-md-10">


        <div class="row">
            <div class="col-md-12 panel-warning">
                <div class="content-box-header panel-heading">
                    <div class="panel-title ">Store manager</div>
                </div>  
                <div class="content-box-large box-with-header">

                    <?php
                    if (isset($_GET["removeid"])) {

                        $req = $db->query('DELETE FROM store WHERE id="' . $_GET['removeid'] . '"');

                    }


                    if (isset($_POST["title"])) {

                        $req = $db->prepare("INSERT INTO store (title, image, price) VALUES (:title, :image, :price)");

                        $req->execute(array(
                            "title" => $_POST["title"],
                            "image" => $_POST["image"],
                            "price" => $_POST["price"]
                        ));

                    }


                    ?>


                    <style>
                        hr {
                            display: block;
                            margin-top: 0.5em;
                            margin-bottom: 0.5em;
                            margin-left: auto;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 1px;
                        }
                    </style>

                    <form class="form-signin" action="storeitems.php" method="post">
                        <div class="container">

                            <!-- Post -->
                            <article class="box post">
                                <h1>STORE ADMINISTRATION</h1>
                                <p>Welcome to the Store, here you can buy some Keys against your points.</p>
                            </article>
                            <hr>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h3 class="text-center">
                                                Adding new Item</h3>
                                            <form class="form form-signup" role="form" action="storeitems.php"
                                                  method="post">
                                                <div class="form-group">
                                                    <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>
                            </span>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                               placeholder="Title"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-th"></span></span>
                                                        <input type="Text" class="form-control" name="image" id="image"
                                                               placeholder="Image Link"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-usd"></span></span>
                                                        <input type="Text" class="form-control" name="price" id="price"
                                                               placeholder="Price"/>
                                                    </div>


                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary btn-block"
                                                        role="button">
                                                    Add to the Store
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <hr/>
                    <!-- Main -->
                    <div id="main-wrapper" id="main">
                        <h3>Items Management</h3>
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
                                                 src="<?= $req['image'] ?>" alt=""/>
                                            <div class="caption">
                                                <hr>
                                                <h4 class="group inner list-group-item-heading"
                                                    style="text-align: center">
                                                    <?= $req['title'] ?></h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <p class="lead">
                                                            <?= $req['price'] ?> <img src="../images/coins.png"></p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <a class="btn btn-danger"
                                                           href="storeitems.php?removeid=<?= $req['id'] ?>">Remove this
                                                            Item</a>
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

                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>