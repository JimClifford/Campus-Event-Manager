<?php
require_once '../function/login_controller.php'; //Require the login controller
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Campus Event Scheduler</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login_register_background.css"> 
  <script src="../js/login_register_background.js" defer></script>
</head>
<body>
<div class="bg-image left"></div>
<div class="bg-image right"></div>
    <div class="login-container">
      <div class="container mt-5">
        <h2 style="color: #1981b9"class="text-center mb-4"> Welcome To Your Campus Event Schedular</h2>
        <h2 class="text-center mb-4">Login Here!</h2>
      <form action="../action/login_user_action.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <p class="mt-3">Don't have an account? <a  style="color: #1981b9" href="register_view.html">Register here</a></p>
    </div> 
<?php
    check_login_errors(); 
    ?>
  </div> 
</body>
</html>
