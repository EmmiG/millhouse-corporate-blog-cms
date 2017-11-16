<?php	
		session_start();
		require 'partials/head.php';
?>

 <div class="main_wrap">
    <div class="jumbotron jumbo_start">
        <img src="images/millhouse_white_logo.svg">
        <a href="#category">
        <div id="arrow_down">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </div>
        </a>
    </div>

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

    </div>
    <div class="container-fluid">
    	<div class="row">
<?php
	 if(isset($_GET['category'])) {
		 include 'partials/sort_category.php';
		 foreach($sorted_posts as $post) { ?>
		 	  <div class="col-sm-3">
		 	  	<div class="category_box">
						<h5>Skapad: <?= $post['time'] ?></h5>
						<h1>Titel: <?= $post['title'] ?></h1>
						<h5>Författare: <?= $post['name'] ?></h5>
						<h5>Innehåll: <?= $post['content'] ?></p>
						<form action="comment.php" method="get">
							<input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
							<input type="submit" value="read more" class="btn btn-primary"/>
					  </form>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>

<?php }  require 'partials/footer.php'; ?>