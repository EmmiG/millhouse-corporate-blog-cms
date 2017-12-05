<?php	
    require_once 'partials/session_start.php';
    require 'partials/head.php';
    require 'partials/database.php';
?>
    <div class="content_wrap">
<?php
    //The loop will get the postID from GET and fetch the entry.
    if(isset($_GET["postID"])) {
			require 'partials/fetch_individual_entry.php';
			foreach($indivudual_post as $post) { ?>
				<div class="entry_box">
                    <h5><?= $post['time'] ?></h5>
                    <h1><?= $post['title'] ?></h1>
                    <h5><?= $post['name'] ?> | category: <?= $post['category'] ?></h5>
                    <article><?= $post['content'] ?></article>
				</div>
			<?php	} ?>
			
			
        <!-- Adding a new comment will lead to another partial that handles that request. -->
	    <div id="comments">
			<h2>Leave a comment</h2>
			<form action="partials/add_comment.php" method="POST">
				<div class="comment_field col-sm-6">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="comment_field col-sm-6">
                    <div class="form-group">
                        <label for="email"> E-mail </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
				<div class="form-group">
					<label for="comment"> Comments </label>
                    <textarea type="text" name="comment" class="form-control" rows="10" required></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" value="<?=$_GET["postID"]; ?>" name="postID">
					<input type="submit" value="Send"class="btn btn-primary">
				</div>
			</form>
		</div>
		
		<h2 style="padding-bottom: 24px;"><?php require 'partials/fetch_comment_count.php'; ?> Comments</h2>
		<!-- The partial gathers the postID and will find any comment attached to it. Then it will use a foreach-loop to print it onto the website. -->
		<?php
			require 'partials/fetch_comments_comment.php';
			foreach($comments as $comment) { ?>
				<div class="entry_box comment_box">
                    <h5>Time: <?= $comment["time"]; ?></h5>
                    <h4>Name: <?= $comment["name"]; ?></h4>
                    <p>Comments: <?= $comment["content"]; ?></p>
                    <hr>
				</div>
			<?php	}
				} ?>
	</div>	
<?php require 'partials/footer.php'; ?>		