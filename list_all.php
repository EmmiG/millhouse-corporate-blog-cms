<?php	
		require 'partials/head.php';
		require 'partials/fetch_entries.php';
		foreach($posts as $post) {
			echo "<div class='entry_box' style='border: 3px solid black; width: 270px;'>";
			echo "<p>Titel: " . $post['title'] . "</p>";
			echo "<p>Innehåll: " . $post['content'] . "</p>";
			echo "<p>Kategori:" . $post['category'] . "</p>";
			echo "</div>";
		}
?>

<a href="post.php" style="font-size: 1.5em; color: black; text-decoration: underline;">Klicka här för att skapa ett nytt inlägg</a>