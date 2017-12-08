<?php	
    require_once 'partials/session_start.php';
    require 'partials/head.php';
?>

<div id="category" class="content_wrap">
        
    <h1>Category</h1>
    <!-- A button that handles ascending or descending options. Will change depending on the value of GET. -->
    <form action="" method="GET">
        <input type="hidden" value="<?= $_GET['category'] ?>" name="category"/>
        <input type="hidden" value="<?php if(isset($_GET['sorting']) && $_GET['sorting'] == 'desc') { echo 'asc'; } else { echo 'desc'; } ?>" name="sorting"/>
        <input type="submit" value="<?php if(isset($_GET['sorting']) && $_GET['sorting'] == 'desc') { echo 'Ascending'; } else { echo 'Descending'; } ?>" class="btn btn-primary descending"/>
    </form>
    <div class="card-wrap">   
        <?php
        //A foreach loop will iterate through a SQL-request depending on the value of GET.
        if(isset($_GET['category'])) {
            include 'partials/sort_category.php';
            foreach($sorted_posts as $post) { ?>  
            <div class="card">
                <?php 
                    if($_GET['category'] == 'sunglasses') {
                        echo '<img src="/images/sunglasses@500px.jpg">';
                   }
                   else if($_GET['category'] == 'interior') {
                        echo '<img src="/images/login_background@500px.jpg">';
                   }
                    else if($_GET['category'] == 'watches') {
                        echo '<img src="/images/watch@500px.jpg">';
                   }
                ?>
                <div class="card-body">
                    <h2 class="card-title"><?= $post['title'] ?></h2>
                    <hr>
                    <span class="span_light"><?= $post['time'] ?> | <?= $post['name'] ?></span>
                    <!-- Using the loop to attach the postID to a hidden form which can take us to the entry itself. -->
                    <form action="comment.php" method="get">
                        <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                        <a href="comment.php?postID=<?= $post['postID'] ?>" class="black-text d-flex flex-row-reverse">
                        <span class="category_readmore">Read more <i class="fa fa-chevron-right"></i></span>
                        </a>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
    
<?php }  require 'partials/footer.php'; ?>