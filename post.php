<?php
    session_start();
		require 'partials/head.php';
		if($_SESSION["loggedIn"] == true) {
			?>
	<div class="container mt-5">
		<h4>Skapa ett nytt inlägg</h4>
		<form action="partials/new_entry.php" method="POST">
			<div class="form-group">

				<label for="username"> Titel </label>

				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="password"> Inlägg </label>

				<input type="text" name="content" class="form-control">

			</div>
			<label for="category"> Välj en kategori </label><br>

			<select class="custom-select" name="category">
				<option selected>Open this select menu</option>
				<option value="Herman">Herman</option>
				<option value="Monica">Monica</option>
				<option value="Vanja">Vanja</option>
			</select>
			<div class="form-group">

				<input type="submit" class="btn btn-primary">
			</div>
		</form>
	</div>
	<?php
		}
		else {
			echo "Nej";
		}
?>
