<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';

        if(isset($_POST["postID"])) {
					require 'partials/fetch_individual_entry.php';
					foreach($indivudual_post as $post) { ?>
                <div id="content" class="container">
                   <?php
				 
				if(isset($_SERVER['HTTP_REFERER'])) {
					echo "<h1><a href=".$_SERVER['HTTP_REFERER'].">Gå tillbaka</a></h1>";
					}
				?>
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
                                <label for="content"> Content </label>
                                <textarea type="text" name="content" id="summernote" rows="15"><?= $post["content"]; ?></textarea>

                                <script>
                                    $(document).ready(function() {
																			$('#summernote').summernote({
																					height: 300,
																					toolbar: [
																						['style', ['bold', 'italic', 'underline', 'clear']],
																						['fontsize', ['fontsize']],
																						['color', ['color']],
																						['para', ['ul', 'ol', 'paragraph']],
																						['height', ['height']],
																						['insert', ['link', 'picture']]
																					],
																				});
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
                                <input type="hidden" value="<?=$_POST["postID"]; ?>" name="postID">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>				




<?php
		
                                               }}
        require 'partials/footer_profile.php';
?>
