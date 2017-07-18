<?php

?>
<?php

include 'includes/header.php';

if (isset($_POST["title"])) {


    $req = $db->prepare('UPDATE config SET title = :title, imgurl = :imgurl, link = :link WHERE id = 1');
    $req->execute(array(
        "title" => $_POST["title"],
        "imgurl" => $_POST["imgurl"],
        "link" => $_POST["link"],
    ));

}

?>
    <div class="col-md-10">
        <div class="row">
            <div class="container">


                <h1>GiveAway</h1>
                <hr>
                <form method="post" action="giveaway.php">

                    <label for="title">
                        <h3>Title</h3>
                        <input type="text" id="title" name="title">
                    </label>
                    <label for="imgurl">
                        <h3>IMG URL</h3>
                        <input type="text" id="imgurl" name="imgurl">
                    </label>
                    <label for="title">
                        <h3>LINK</h3>
                        <input type="text" id="link" name="link">
                    </label>

                    <button type="submit">Submit</button>

                </form>


            </div>

        </div>
    </div>
<?php include 'includes/footer.php'; ?>