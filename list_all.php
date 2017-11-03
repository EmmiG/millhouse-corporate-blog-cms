<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/fetch_entries.php';
		if(isset($_SESSION["user"]["username"])) {
			echo "Du är inloggad som " . $_SESSION["user"]["username"];
		}
		else {
			echo 'Du är ej inloggad. Logga in <a href="index.php" style="text-decoration: underline;">här</a>';
		}
		foreach($posts as $post) {
			echo "<div class='entry_box' style='border: 3px solid black; width: 270px;'>";
			echo "<p>Titel: " . $post['title'] . "</p>";
			echo "<p>Innehåll: " . $post['content'] . "</p>";
			echo "<p>Kategori: " . $post['category'] . "</p>";
			echo "<p>Skapad av: " . $post['name'] . "</p>";
			echo "<p>E-mail: " . $post['email'] . "</p>";
			echo "<p>Skapad: " . $post['time'] . "</p>";
			echo "</div>";
		}
if(isset($_SESSION["user"]["username"])) {
	echo '<form action="partials/logout.php" method="post">';
	echo '<input type="submit" value="logga ut" class="btn btn-primary"/>';
	echo '</form>';
}

?>

<a href="post.php" style="font-size: 1.5em; color: black; text-decoration: underline;">Klicka här för att skapa ett nytt inlägg</a>