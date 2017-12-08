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
    <span class="sr-only">Scrolls down the page to the first post</span>
    </a>
</div>

<div id="blog" class="content_wrap">
    <article>
    <!-- The fetch_entries partial gathers all entries and the foreach-loop prints them out. -->
    <?php
        foreach($posts as $post) {?>
            <div class="entry_box">
                <span class="span_light"><?= $post['time'] ?></span>
                <h1><?= $post['title'] ?></h1>
                <span class="span_light"><?= $post['name'] ?> | category: <?= $post['category'] ?></span>
                <article><?= $post['content'] ?></article>
                    <!-- The two partials below gather the like/comment-count for each individual post through the hidden postID-values. -->
                    <div class="btn_wrap">
                        <form action="comment.php#comments" method="get">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="<?php require 'partials/fetch_comment_count.php'; ?>comments" class="btn btn_ghost"/>
                        </form>

                        <form id="like_<?= $post["postID"] ?>" action="partials/like.php" method="post">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="<?php require 'partials/fetch_like_count.php'?>likes &#9829;" class="btn btn_ghost"/>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>

                <hr>

        <?php } ?>  
    </article>
    <!-- The total records variable is needed in order for the pagination to work. The postamount function let's us know how many entries that are present in the database. Then the pagination_pages will print out the pagination results. -->
    <div class="pagination">  
        <?php
            $total_records = postamount();
            require 'partials/pagination_pages.php';
        ?> 
    </div>
    <div class="clear"></div>  
</div>

<?php require 'partials/footer.php'; ?>