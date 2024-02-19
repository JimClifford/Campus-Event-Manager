<?php
require_once '../settings/config_session.php'; //Require the session configuration
require_once '../function/register_controller.php'; //Require the register controller
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Campus Event Scheduler</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .register-container {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2 class="text-center mb-4">Register</h2>
    <form action="../action/register_user_action.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" >
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    <p class="mt-3 text-center">Already have an account? <a href="./login_view.php">Login here</a></p>
  </div>
    <?php
    check_registration_errors(); //Check for registration errors
    ?>

</body>
</html>