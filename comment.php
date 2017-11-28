<?php	
    session_start();
    require 'partials/head.php';
    require 'partials/database.php';
?>
        <div class="content_wrap">
<?php
    if(isset($_GET["postID"])) {
			require 'partials/fetch_individual_entry.php';
			foreach($indivudual_post as $post) { ?>
				<div class="entry_box">
                    <h5>Skapad: <?= $post['time'] ?></h5>
                    <h1>Titel: <?= $post['title'] ?></h1>
                    <h5>Författare: <?= $post['name'] ?> | Kategori: <?= $post['category'] ?></h5>
                    <p>Innehåll: <?= $post['content'] ?></p>
                    <h5>E-mail: <?= $post['email'] ?></h5>
				</div>
			<?php	} ?>
			
			
			
	    <div id="comments">
			<h2>Leave a comment</h2>
			<form action="partials/add_comment.php" method="POST">
				<div class="comment_field col-sm-6">
                    <div class="form-group">
                        <label for="name"> Namn </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="comment_field col-sm-6">
                    <div class="form-group">
                        <label for="email"> E-post </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
				<div class="form-group">
					<label for="comment"> Kommentar </label>
                    <textarea type="text" name="comment" class="form-control" rows="10" required></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" value="<?=$_GET["postID"]; ?>" name="postID">
					<input type="submit" class="btn btn-primary">
				</div>
			</form>
		</div>
		
		<h2><?php require 'partials/fetch_comment_count.php'; ?> Comments</h2>
		
		<?php
			require 'partials/fetch_comments_comment.php';
			foreach($comments as $comment) { ?>
				<div class="entry_box">
				<p>Namn: <?= $comment["name"]; ?></p>
				<p>E-post: <?= $comment["email"]; ?></p>
				<p>Tid: <?= $comment["time"]; ?></p>
				<p>Kommentar: <?= $comment["content"]; ?></p>
                <hr>
				</div>
			<?php	}
				} ?>
	</div>	
<?php require 'partials/footer.php'; ?>		