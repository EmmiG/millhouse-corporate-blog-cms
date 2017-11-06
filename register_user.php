<?php	require 'partials/head.php'; ?>
 <div class="container mt-5">
  <h4>Register</h4>
  <form action="partials/register.php" method="POST">
    <div class="form-group">

      <label for="username"> Username </label>

      <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label for="password"> Password </label>

      <input type="password" name="password" class="form-control">

    </div>
    <div class="form-group">

      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
<?php require 'partials/footer.php'; ?>

