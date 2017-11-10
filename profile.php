<?php
       session_start();
       require 'partials/head.php';
       require 'partials/database.php';
       
       $statement = $pdo->prepare("SELECT COUNT(*) FROM posts where userID = :userID");
       $statement->execute(array(
       ":userID" => $_SESSION["user"]["userID"]
   ));
       $count = $statement->fetch(PDO::FETCH_ASSOC);
       foreach($count as $c) {
           echo $c;
           echo "</br>";
       }




       $statement = $pdo->prepare("SELECT title, content, time, name, email FROM posts WHERE userID = :userID ORDER BY postID DESC LIMIT 5");
       $statement->execute(array(
       ":userID" => $_SESSION["user"]["userID"]
   ));
			 echo "HÄMTAR INLÄGG</br></br>";
       $count = $statement->fetchAll(PDO::FETCH_ASSOC);
       foreach($count as $c) {
           echo $c['content'];
				 	 echo "</br>";
					 echo $c['time'];
				   echo "</br>";
				   echo $c['name'];
				 	 echo "</br>";
				 	 echo $c['email'];
           echo "</br>";
           
       }


       $statement = $pdo->prepare("SELECT COUNT(*) FROM comments where userID = :userID");
       $statement->execute(array(
       ":userID" => $_SESSION["user"]["userID"]
   ));
       $count = $statement->fetch(PDO::FETCH_ASSOC);
       foreach($count as $c) {
           echo $c;
           echo "<br>";
       }

       $statement = $pdo->prepare("SELECT content, name, time, email FROM comments where userID = :userID order by id DESC LIMIT 5");
       $statement->execute(array(
       ":userID" => $_SESSION["user"]["userID"]
   )); echo "HÄMTAR KOMMENTARER </br></br>";
       $count = $statement->fetchAll(PDO::FETCH_ASSOC);
       foreach($count as $c) {
           echo $c['content'];
				 	 echo "</br>";
					 echo $c['time'];
				   echo "</br>";
				   echo $c['name'];
				 	 echo "</br>";
				 	 echo $c['email'];
           echo "</br>";
       }

?>