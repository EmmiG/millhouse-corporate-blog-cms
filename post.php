<?php
    session_start();
		require 'partials/head.php';
		if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
			?>
	<div style="margin-top: 100px" class="container mt-5">
		<h4>Skapa ett nytt inlägg</h4>
		<form action="partials/new_entry.php" method="POST">
			<div class="form-group">

				<label for="username"> Titel </label>

				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="password"> Inlägg </label>

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
				<label for="email"> E-post </label>

				<input type="email" name="email" class="form-control">

			</div>
			<label for="category"> Välj en kategori </label><br>

			<select class="custom-select" name="category">
				<option selected>Open this select menu</option>
				<option value="Kläder">Kläder</option>
				<option value="Frukter">Frukter</option>
				<option value="Verktyg">Verktyg</option>
			</select>
			<div class="form-group">

				<input type="submit" class="btn btn-primary">
			</div>
		</form>
	</div>
	<?php
		}
		else {
			echo "Logga in för att skapa ett inlägg.";
		}
?>
		<a href="index.php" style="font-size: 1.5em; color: black; text-decoration: underline;">Klicka här för att komma tillbaka.</a>
<?php require 'partials/footer.php'; ?>