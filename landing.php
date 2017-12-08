<?php
    require_once 'partials/session_start.php';
    require 'partials/head.php';
    require 'partials/database.php';
?>

    <div class="jumbotron jumbo_login"> 
        <div class="row">
            <div class="login_box">
                <!-- This message will only be present if a user is trying to enter their dashboard without being logged in. -->
                <?php 
                    if(isset($_GET['logged_in'])) { 
				        echo "<p class='p_login'>Please login in order to access your dashboard</p>";
                    } 	
                    if(isset($_GET['error'])) { 
				        echo "<p class='p_login'>Wrong username or password.</p>";
                    } 
				?>
                <img src="images/millhouse_white_logo.svg">
                <h1>LOGIN</h1>
                <form action="partials/login.php" method="POST">
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" name="password" class="form-control" placeholder="***********">
                    </div>
                    <p class="p_forgot"><a href="#">Forgot details?</a></p>
                    <div class="form-group">
                        <input type="submit" value="log in" class="btn btn-primary">
                    </div>
                    <div class="register_text">
                        <p>Don't have an account?</p>
                        <p><a href="register_user.php">Register here!</a></p>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
<div class="jumbotron jumbo_login"> 
    <div class="row">
        <div class="login_box">
            <!-- This message will only be present if a user is trying to enter their dashboard without being logged in. -->
            <?php if(isset($_GET['logged_in'])) { 
                echo "<p class='p_login'>Please login in order to access your dashboard</p>";
            } ?>
            <img src="images/millhouse_white_logo.svg" alt="millhouse logo login box">
            <h1>LOGIN</h1>
            <form action="partials/login.php" method="POST">
                <div class="form-group">
                    <label for="username"> Username </label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password"> Password </label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="***********">
                </div>
                <p class="p_forgot"><a href="#">Forgot details?</a></p>
                <div class="form-group">
                    <input type="submit" value="log in" class="btn btn-primary">
                </div>
                <div class="register_text">
                    <p>Don't have an account?</p>
                    <p><a href="register_user.php">Register here!</a></p>
                </div>
            </form>
        </div><!--end login_box-->
    </div><!--end row--> 
</div><!--end jumbotron-->


<?php require 'partials/footer.php'; ?>