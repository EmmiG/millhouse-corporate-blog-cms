<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/database.php';
		if(isset($_POST["postID"])) {
			$statement = $pdo->prepare("SELECT * FROM posts WHERE postID = :postID");

			$statement->execute(array(
				":postID"     => $_POST["postID"]
				));

			$indivudual_post = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach($indivudual_post as $post) { ?>
				<div class='entry_box' style='border: 3px solid black; width: 270px;'>
				<p>Titel: <?= $post["title"]; ?></p>
				<p>Innehåll: <?= $post["content"]; ?></p>
				<p>Kategori: <?= $post["category"]; ?></p>
				<p>Författare: <?= $post["name"]; ?></p>
				<p>E-mail: <?= $post["email"]; ?></p>
				<p>Skapad: <?= $post["time"]; ?></p>
				</div>
			<?php	} ?>
	<div class="container mt-5">
			<h4>Kommentera</h4>
			<form action="partials/add_comment.php" method="POST">
				<div class="form-group">

					<label for="name"> Namn </label>

					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email"> E-post </label>

					<input type="email" name="email" class="form-control" required>

				</div>
				<div class="form-group">
					<label for="comment"> Kommentar </label>

					<input type="text" name="comment" class="form-control" required>

				</div>
				<div class="form-group">
					<input type="hidden" value="<?=$_POST["postID"]; ?>" name="postID">
					<input type="submit" class="btn btn-primary">
				</div>
			</form>
		</div>
		<?php	
			$statement = $pdo->prepare("SELECT * FROM comments WHERE postID = :postID");

			$statement->execute(array(
				":postID"     => $_POST["postID"]
				));

			$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($comments as $comment) { ?>
				<div class='entry_box' style='border: 3px solid black; width: 270px;'>
				<p>Namn: <?= $comment["name"]; ?></p>
				<p>E-post: <?= $comment["email"]; ?></p>
				<p>Tid: <?= $comment["time"]; ?></p>
				<p>Kommentar: <?= $comment["content"]; ?></p>

				</div>
			<?php	}
				} ?>
		
		