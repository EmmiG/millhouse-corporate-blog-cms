<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/database.php';

		$statement = $pdo->prepare("SELECT * FROM posts WHERE postID = :postID");

		$statement->execute(array(
			":postID"     => $_POST["postID"]
			));

		$indivudual_post = $statement->fetchAll(PDO::FETCH_ASSOC);

		foreach($indivudual_post as $post) {
			echo "<div class='entry_box' style='border: 3px solid black; width: 270px;'>";
			echo "<p>Titel: " . $post['title'] . "</p>";
			echo "<p>Innehåll: " . $post['content'] . "</p>";
			echo "<p>Kategori: " . $post['category'] . "</p>";
			echo "<p>Författare: " . $post['name'] . "</p>";
			echo "<p>E-mail: " . $post['email'] . "</p>";
			echo "<p>Skapad: " . $post['time'] . "</p>";
		}

?>