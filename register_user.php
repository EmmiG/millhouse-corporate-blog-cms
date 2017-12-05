<?php	require 'partials/head.php'; ?>

<div class="jumbotron jumbo_login"> 
    <div class="container">
        <div class="row">
            <div class="login_box">
                <img src="images/millhouse_white_logo.svg">
                <h1>Register</h1>
                    <form action="partials/register.php" method="POST">
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" name="password" class="form-control" placeholder="***********">
                    </div>
                    <div class="form-group">
                        <label for="email"> E-mail </label>
                        <input type="email" name="email" class="form-control" placeholder="Example@example.com">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="register" class="btn btn-primary">
                    </div>
                    <div class="register_text">
                        <p>Already have an account?</p>
                        <p><a href="landing.php">Log in here!</a></p>
                    </div>
                  </form>
                </div>
            </div>
        </div> 
    </div> 
    
<?php
	if(isset($_SERVER['HTTP_REFERER'])) {
		echo "<a href=".$_SERVER['HTTP_REFERER'].">Go back</a>";
				}
require 'partials/footer.php'; ?>


