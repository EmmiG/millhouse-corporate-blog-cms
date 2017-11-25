<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/fetch_entries.php';
?>
    <div class="main_wrap">
        <div class="jumbotron jumbo_start">
            <img src="images/millhouse_white_logo.svg">
            <a href="index.php#blog">
            <div id="arrow_down">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
            </a>
        </div>

        <div id="blog" class="content_wrap">
            <article>
            <?php
                foreach($posts as $post) {?>
                    <div class="entry_box">
                        <h5><?= $post['time'] ?></h5>
                        <h1><?= $post['title'] ?></h1>
                        <h5><?= $post['name'] ?> | Kategori: <?= $post['category'] ?></h5>
                        <article><?= $post['content'] ?></article>
                        <h5><?= $post['email'] ?></h5>

                            <form action="comment.php#comments" method="get">
                                <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                                <input type="submit" value="<?php
                                 $statement = $pdo->prepare("SELECT COUNT(*) FROM comments where postID = :postID");
                                 $statement->execute(array(
                                 ":postID"        => $post["postID"]
                                ));
                                 $count = $statement->fetch(PDO::FETCH_ASSOC);
                                 foreach($count as $c) {
                                    if($c != "0") {
                                         echo $c . " ";
                                    }
                                    }?>comments" class="btn btn-primary"/>
                            </form>
                            
                            <form action="partials/like.php" method="post">
                                <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                                <input type="submit" value="<?php
                                $statement = $pdo->prepare("SELECT COUNT(*) FROM likes where postID = :postID");
                                $statement->execute(array(
                                ":postID"        => $post["postID"]
                                ));
                                          
                                $count = $statement->fetch(PDO::FETCH_ASSOC);
                                foreach($count as $c) {
                                if($c != "0") {
                                echo $c . " ";
                                }
                                }?>like" class="btn btn-primary"/>
                            </form>
                            
                            <hr>
                        </div> 
                <?php } ?>  
            </article>
            <?php
            function postamount() {
							require 'partials/database.php';
							$statement = $pdo->prepare("SELECT COUNT(*) FROM posts");
							$statement->execute();
							$count = $statement->fetch(PDO::FETCH_ASSOC);
							foreach($count as $c) {
								return $c;
							}
						}
						$total_records = postamount();
						$total_pages = ceil($total_records / $limit);  
						$page_links = '<nav aria-label="Page navigation example"><ul class="pagination">';
						if(isset($_GET['page']) && $_GET['page'] > 1) {
							$page_links .= "<li class='page-item'><a class='page-link' href='index.php?page=".($_GET['page'] - 1)."' aria-label='Previous'><span aria-hidden='true' class='glyphicon glyphicon-chevron-left'><span class='sr-only'>Previous</span></a></li>";
						}
						if(empty($_GET['page'])) {
							for ($i=1; $i<=$total_pages; $i++) {  
								 if(1 == $i) {
									$page_links .= "<li class='active'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>"; 
								 }
								else {
									$page_links .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>"; 
								 }
							};   
							if($total_pages > 1) {
								$page_links .= "<li class='page-item'><a class='page-link' href='index.php?page=2' aria-label='Next'><span aria-hidden='true' class='glyphicon glyphicon-chevron-right'><span class='sr-only'>Next</span></a></li>";
							}
							echo $page_links . "</ul></nav>"; 
						}
						if(isset($_GET['page'])) {
							for ($i=1; $i<=$total_pages; $i++) {  
								if($_GET['page'] == $i) {
									$page_links .= "<li class='active'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>"; 
								 }
								else {
									$page_links .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>"; 
								 }
							}
							if($_GET['page'] < $total_pages) {
								$page_links .= "<li><a class='page-link' href='index.php?page=".($_GET['page'] + 1)."' aria-label='Next'><span aria-hidden='true' class='glyphicon glyphicon-chevron-right'></span><span class='sr-only'>Next</span></a></li>";
								
							}
							echo $page_links . "</ul></nav>";  
						}
						
						?> 
        </div>
    </div>    


<?php require 'partials/footer.php'; ?>