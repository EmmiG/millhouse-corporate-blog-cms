<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/fetch_entries.php';
		if(isset($_SESSION["user"]["username"])) {
			echo "Du är inloggad som " . $_SESSION["user"]["username"];
		}
		else {
			echo 'Du är ej inloggad. Logga in <a href="landing.php" style="color: #000;">här</a>';
		}
?>
    <div class="main_wrap">
        <div class="jumbotron jumbo_start">
            <img src="images/millhouse_white_logo.svg">
            <a href="index.php#blog">
            <div id="arrow_down">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
            </a>
        </div>

        <div id="blog" class="content_wrap">
            <article>
            <?php
                foreach($posts as $post) {?>
                    <div class="entry_box">
                        <h5>Skapad: <?= $post['time'] ?></h5>
                        <h1>Titel: <?= $post['title'] ?></h1>
                        <h5>Författare: <?= $post['name'] ?> | Kategori: <?= $post['category'] ?></h5>
                        <p>Innehåll: <?= $post['content'] ?></p>
                        <h5>E-mail: <?= $post['email'] ?></h5>


                    <?php if(isset($_SESSION["user"]["username"])) {
                        if($_SESSION["user"]["username"] == $post['name']) {?> 

                            <form action="partials/delete_entry.php" method="post">
                                <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
                                <input type="submit" value="ta bort" class="btn btn-primary"/>
                            </form>
                            <form action="edit_post.php" method="post">
                                <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                                <input type="submit" value="redigera" class="btn btn-primary"/>
                            </form>
                        <?php } else {
                               echo "DU KAN INTE REDIGERA DETTA INLÄGG";
                                }
                             } ?>

                            <form action="comment.php#comments" method="post">
                                <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                                <input type="submit" value="kommentera" class="btn btn-primary"/>
                            </form>
                            <hr>
                        </div> 
                <?php } ?>  
            </article>
        </div>
    </div>    
    <?php
            if(isset($_SESSION["user"]["username"])) { ?>
                    <form action="partials/logout.php" method="post">
                        <input type="submit" value="logga ut" class="btn btn-primary"/>
                    </form>
            <?php } ?>



<a href="post.php" style="font-size: 1.5em; color: black; text-decoration: underline;">Klicka här för att skapa ett nytt inlägg</a>


<?php require 'partials/footer.php'; ?>