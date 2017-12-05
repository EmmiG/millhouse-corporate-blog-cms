<?php
    require_once 'partials/session_start.php';
    if(isset($_SESSION['user'])) {
    require 'partials/database.php';
    require 'partials/head_profile.php';
?>

<div id="content" class="container">
    <h4>New post</h4>
    <form action="partials/new_entry.php" method="POST">
        <div class="form-group">
            <label for="username"> Title </label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="password"> Content </label>
            <textarea type="text" name="content" id="summernote" rows="15"></textarea>
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

        <label for="category"> Choose category</label><br>
        <select class="custom-select" name="category">
            <option selected>Open this select menu</option>
            <option class="btn" value="Kläder">Clothes</option>
            <option class="btn" value="Frukter">Fruits</option>
            <option class="btn" value="Verktyg">Tools</option>
        </select>

        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-primary">
        </div>

    </form>
</div>

<?php  
    require 'partials/footer_profile.php';
    }
    else {
    header('Location: landing.php?logged_in=false');
    }
?>