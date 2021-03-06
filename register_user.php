<?php require 'partials/head.php'; ?>

<div class="jumbotron jumbo_login"> 
    <div class="container">
        <div class="row">
            <div class="login_box">

            <?php 
                if(isset($_GET['username'])) { 
                    echo "<p class='p_login'>The username is already taken.</p>";
                } 				
				?>
                <img src="images/millhouse_white_logo.svg" alt="millhouse logo register user">

                <h1>Register</h1>
                    <form action="partials/register.php" method="POST">
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="***********">
                    </div>
                    <div class="form-group">
                        <label for="email"> E-mail </label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Example@example.com">
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
    require 'partials/footer.php'; 
?>