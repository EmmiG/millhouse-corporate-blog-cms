<?php
    session_start();
    require 'partials/head.php';
    require 'partials/database.php';

?>

    <div class="jumbotron jumbo_login"> 
        <div class="row">
            <div class="login_box">
                <img src="images/millhouse_white_logo.svg">
                <h3>LOGIN</h3>
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



<?php require 'partials/footer.php'; ?>
