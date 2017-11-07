<?php	
		session_start([
    'cookie_lifetime' => 7200,
]);
		require 'partials/head.php';
		require 'partials/fetch_entries.php';
		if(isset($_SESSION["user"]["username"])) {
			echo "Du är inloggad som " . $_SESSION["user"]["username"];
		}
		else {
			echo 'Du är ej inloggad. Logga in <a href="landing.php" style="text-decoration: underline;">här</a>';
		}
		foreach($posts as $post) {
			echo "<div class='entry_box' style='border: 3px solid black; width: 270px;'>";
			echo "<p>Titel: " . $post['title'] . "</p>";
			echo "<p>Innehåll: " . $post['content'] . "</p>";
			echo "<p>Kategori: " . $post['category'] . "</p>";
			echo "<p>Författare: " . $post['name'] . "</p>";
			echo "<p>E-mail: " . $post['email'] . "</p>";
			echo "<p>Skapad: " . $post['time'] . "</p>";
			if(isset($_SESSION["user"]["username"])) {
				if($_SESSION["user"]["username"] == $post['name']) {
					echo '<form action="partials/delete_entry.php" method="post">';
					echo '<input type="hidden" value="'.$post["postID"].'" name="postID"/>';
					echo '<input type="submit" value="ta bort" class="btn btn-primary"/>';
					echo '</form>';
					echo '<form action="edit_post.php" method="post">';
					echo '<input type="hidden" value="'.$post["postID"].'" name="postID"/>';
					echo '<input type="submit" value="redigera" class="btn btn-primary"/>';
					echo '</form>';
				}
				else {
					echo "DU KAN INTE REDIGERA DETTA INLÄGG";
				}
			}
				echo '<form action="comment.php" method="post">';
				echo '<input type="hidden" value="'.$post["postID"].'" name="postID"/>';
				echo '<input type="submit" value="kommentera" class="btn btn-primary"/>';
				echo '</form>';
			echo "</div>";
		}
		if(isset($_SESSION["user"]["username"])) {
			echo '<form action="partials/logout.php" method="post">';
			echo '<input type="submit" value="logga ut" class="btn btn-primary"/>';
			echo '</form>';
		}


?>

<a href="post.php" style="font-size: 1.5em; color: black; text-decoration: underline;">Klicka här för att skapa ett nytt inlägg</a>