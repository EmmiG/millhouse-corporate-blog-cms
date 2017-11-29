<?php
		$statement = $pdo->prepare("SELECT COUNT(*) FROM likes where postID = :postID");
		$statement->execute(array(
		":postID"        => $post["postID"]
		));

		$count = $statement->fetch(PDO::FETCH_ASSOC);
		foreach($count as $c) {
		echo $c . " ";
		}
?>