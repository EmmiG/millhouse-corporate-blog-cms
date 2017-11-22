<?php	
		session_start();
		require 'partials/head.php';
		require 'partials/database.php';
		if(isset($_SESSION["user"]["username"])) {
			if(isset($_GET["postID"]) && $_SESSION["user"]["userID"] == $_GET["author"] or $_SESSION["user"]["username"] == "admin") {
				$statement = $pdo->prepare("SELECT * FROM posts WHERE postID = :postID");
				$statement->execute(array(
					":postID"     => $_GET["postID"]
					));
				$indivudual_post = $statement->fetchAll(PDO::FETCH_ASSOC); ?>
            
            <div id="blog" class="content_wrap">
<?php
                foreach($indivudual_post as $post) { ?>
                    <div class="entry_box">
                        <h4>Ändra inlägg</h4>
                        <form action="partials/edit_entry.php" method="POST">
                            <div class="comment_field col-sm-12">
                                <div class="form-group">
                                    <label for="title"> Titel </label>
                                    <input type="text" name="title" class="form-control" value="<?= $post["title"]; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="content"> Innehåll </label>
																<textarea type="text" name="content" id="summernote" rows="15"></textarea>
                                
                                <script>
																		$(document).ready(function() {
																						$('#summernote').summernote({
																								height: 300,
																						});
																			$("#summernote").summernote("code", "<?= $post["content"]; ?>");
																		});
																</script>

                            </div>
                            <div class="form-group">
                                <label for="category"> Kategori </label><br>
                                <select class="custom-select" name="category" required>
                                    <option selected><?= $post["category"]; ?></option>
                                    <option value="Frukter">Frukter</option>
                                    <option value="Verktyg">Verktyg</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="comment"> E-mail </label>
                                <input type="email" name="email" class="form-control" value="<?= $post["email"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?=$_GET["postID"]; ?>" name="postID">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>				
			<?php
				} 
				if(isset($_SERVER['HTTP_REFERER'])) {
					echo "<a href=".$_SERVER['HTTP_REFERER'].">Gå tillbaka</a>";
					}
				}
		}
		require 'partials/footer.php';	?>