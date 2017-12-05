<?php
    require_once 'partials/session_start.php';
    //This page will only appear if the user is logged in. If not logged in, he/she will be re-directed.
    if(isset($_SESSION['user'])) {
        require 'partials/database.php';
        require 'partials/head_profile.php';
?>
<!-- The new entry partial will gather the data through POST and add it to the SQL-database. -->
<div id="content" class="container">
    <h2>New post</h2>
    <form action="partials/new_entry.php" method="POST">
        <div class="form-group">
            <label for="username"> Title </label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="password"> Content </label>
            <textarea type="text" name="content" id="summernote" rows="15"></textarea>
                <!-- We use the Summernote.js-plugin for WYSIWIG implementation. -->
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