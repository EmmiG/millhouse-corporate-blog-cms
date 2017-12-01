<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';

        if(isset($_POST["postID"])) {
            require 'partials/fetch_individual_entry_profile.php';
            foreach($indivudual_post as $post) { ?>
        <div id="content" class="container">
           <?php

        if(isset($_SERVER['HTTP_REFERER'])) {
            echo "<h1 style='text-align: left;'><a style='color: #013249;' href=".$_SERVER['HTTP_REFERER']."><i class='fa fa-caret-left' aria-hidden='true'></i> go back</a></h1>";
            }
        ?>
            <div class="entry_box edit_box">
                <h4>Edit post</h4>
                <form action="partials/edit_entry.php" method="POST">
                    <div class="comment_field col-sm-12">
                        <div class="form-group">
                            <label for="title"> Title </label>
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
                        <label for="category"> Category </label><br>
                        <select class="custom-select" name="category" required>
                            <option selected><?= $post["category"]; ?></option>
                            <option value="Frukter">Fruits</option>
                            <option value="Verktyg">Tools</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?=$_POST["postID"]; ?>" name="postID">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            			
<?php
		
                                               }}
        require 'partials/footer_profile.php';
?>