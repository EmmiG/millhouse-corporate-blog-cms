<?php	
    require_once 'partials/session_start.php';
    require 'partials/head.php';
    require 'partials/fetch_entries.php';
    require 'partials/functions.php';
?>

<div class="jumbotron jumbo_start">
    <img src="images/millhouse_white_logo.svg">
    <a href="#blog">
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
                <h5><?= $post['time'] ?></h5>
                <h1><?= $post['title'] ?></h1>
                <h5><?= $post['name'] ?> | category: <?= $post['category'] ?></h5>
                <article><?= $post['content'] ?></article>

                    <div class="btn_wrap">
                        <form action="comment.php#comments" method="get">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="<?php require 'partials/fetch_comment_count.php'; ?>comments" class="btn btn_ghost"/>
                        </form>

                        <form id="like" action="partials/like.php" method="post">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="<?php require 'partials/fetch_like_count.php'?>likes &#9829;" class="btn btn_ghost"/>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>

                <hr>

        <?php } ?>  
    </article>

    <div class="pagination">  
        <?php
            $total_records = postamount();
            require 'partials/pagination_pages.php';
        ?> 
    </div>
    <div class="clear"></div>  
</div>

<?php require 'partials/footer.php'; ?>