<?php	
		session_start();
		require 'partials/head.php';
?>

<div id="category" class="content_wrap">
    <div class="buttons">
        <form action="#category" method="get">
            <input type="hidden" value="kläder" name="category"/>
            <input type="submit" value="kläder" class="btn btn-primary"/>
        </form>

        <form action="#category" method="get">
            <input type="hidden" value="verktyg" name="category"/>
            <input type="submit" value="verktyg" class="btn btn-primary"/>
        </form>

        <form action="#category" method="get">
            <input type="hidden" value="frukter" name="category"/>
            <input type="submit" value="frukter" class="btn btn-primary"/>
        </form>
    </div>
        
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