<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';

        if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
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
                            });
                    });
                </script>
        </div>

        <div class="form-group">
            <label for="email"> E-mail </label>
            <input type="email" name="email" class="form-control">
        </div>

        <label for="category"> Choose category</label><br>
        <select class="custom-select" name="category">
            <option selected>Open this select menu</option>
            <option value="Kläder">Clothes</option>
            <option value="Frukter">Fruits</option>
            <option value="Verktyg">Tools</option>
        </select>

        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>

    </form>
</div>

<?php } 

require 'partials/footer_profile.php'; ?>

