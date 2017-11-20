<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
?>


<div id="content" class="container">
    <div class="row">
        <div class="shortcut_box col-xs-6 col-sm-3">
            <p>New post</p>
        </div>
        <div class="shortcut_box col-xs-6 col-sm-3">
            <p>Edit post</p>
        </div>
        <div class="shortcut_box col-xs-6 col-sm-3">
            <p>Delete post</p>
        </div>
        <div class="shortcut_box col-xs-6 col-sm-3">
            <p>Delete comment</p>
        </div>
    </div>
    
            <div class="row">
                <div class="overview_wrap col-sm-12">
                    <div style=" color: #FFF; background-color: #0F3248;" class="row">
                        <div class="col-sm-12">      
                            <h3>Overview</h3>
                        </div>
                    </div>

                    <div class="overview_loop row">
                        <div class="col-sm-3">
                            <?php  $statement = $pdo->prepare("SELECT COUNT(*) FROM posts");
                                $statement->execute(array(
                                ":userID" => $_SESSION["user"]["userID"]
                                ));
                                $count = $statement->fetch(PDO::FETCH_ASSOC);
                                foreach($count as $c) { ?>
                                <p>Total posts: <?= $c ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <?php  $statement = $pdo->prepare("SELECT COUNT(*) FROM posts where userID = :userID");
                                $statement->execute(array(
                                ":userID" => $_SESSION["user"]["userID"]
                                ));
                                $count = $statement->fetch(PDO::FETCH_ASSOC);
                                foreach($count as $c) { ?>
                                <p>My posts: <?= $c ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <?php $statement = $pdo->prepare("SELECT COUNT(*) FROM comments");
                            $statement->execute(array(
                            ":userID" => $_SESSION["user"]["userID"]
                            ));

                            $count = $statement->fetch(PDO::FETCH_ASSOC);
                            foreach($count as $c) { ?>
                                <p>Total comments: <?= $c ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <?php $statement = $pdo->prepare("SELECT COUNT(*) FROM comments where userID = :userID");
                            $statement->execute(array(
                            ":userID" => $_SESSION["user"]["userID"]
                            ));

                            $count = $statement->fetch(PDO::FETCH_ASSOC);
                            foreach($count as $c) { ?>
                                <p>My comments: <?= $c ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
     
           
           <!--Visar fem senaste inlägg och kommentarer-->
                    <div class="row">
                        <div class="recent_box col-sm-6">
                             <div class="col-sm-12">
                             
                             <?php $statement = $pdo->prepare("SELECT title, content, time, name, email FROM posts WHERE userID = :userID ORDER BY postID DESC LIMIT 5");   $statement->execute(array(":userID" => $_SESSION["user"]["userID"]
                             )); ?>
                              
                               <div style="color: #FFF; background-color: #0F3248;" class="row">
                                    <div class="col-sm-12">      
                                        <h3>Recent posts</h3>
                                    </div>
                                </div>    
                                 
                            <?php $count = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($count as $c) { ?>
                                <div style="border: 1px solid black; background-color: #FFF; margin-bottom: 8px; padding: 8px;"  class="recent_loop row">
                                    <p> <?= $c['time'] ?> </p>
                                    <p> <?= $c['title'] ?></p>
                                    <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $c['content'] ?></p>
                                    <!--<p> <?= $c['email'] ?></p>-->
                                </div>        
                            <?php } ?>
                            
                            </div>
                        </div>   
    

                        <div class="recent_box col-sm-6">
                            <div class="col-sm-12">
                            
                            <?php $statement = $pdo->prepare("SELECT content, name, time, email FROM comments order by ID DESC LIMIT 5");
                            $statement->execute(array(":userID" => $_SESSION["user"]["userID"]
                            )); ?>
                            
                                <div style=" color: #FFF; background-color: #0F3248;" class="row">
                                    <div class="col-sm-12">      
                                        <h3>Recent comments</h3>
                                    </div>
                                </div>
                                
                                <?php $count = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach($count as $c) { ?>
                                <div style="border: 1px solid black; background-color: #FFF; margin-bottom: 8px; padding: 8px;"  class="recent_loop row">
                                    <p> <?= $c['time'] ?></p>
                                    <p> <?= $c['name'] ?></p>
                                    <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"> <?= $c['content']; ?> </p> 
                                    <!--<p> <?= $c['email'] ?></p>-->
                                </div>
                                <?php } ?>
                            </div>
                        </div> 
                        
                        
                    </div>
            
        </div>
  
   

<?php
        require 'partials/footer_profile.php';
?>
