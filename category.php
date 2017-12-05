<?php	
		require_once 'partials/session_start.php';
		require 'partials/head.php';
?>

<div id="category" class="content_wrap">
        
    <h1>Category</h1>
    <div class="card-wrap">   
        <?php
        if(isset($_GET['category'])) {
        include 'partials/sort_category.php';
        foreach($sorted_posts as $post) { ?>  
        <div class="card">
            <img src="/images/watch@500px.jpg">
            <div class="card-body">
                <h4 class="card-title"><?= $post['title'] ?></h4>
                <hr>
                <h5><?= $post['time'] ?> | <?= $post['name'] ?></h5>
<!--                    <p class="card-text"><?= $post['content'] ?></p>-->

                <form action="comment.php" method="get">
                    <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                    <a href="comment.php?postID=<?= $post['postID'] ?>" class="black-text d-flex flex-row-reverse">
                    <h3 class="card_h3">Read more <i class="fa fa-chevron-right"></i></h3>
                    </a>
                </form>
            </div>
        </div>

        <?php } ?>
    </div>
</div>
    
<?php }  require 'partials/footer.php'; ?>