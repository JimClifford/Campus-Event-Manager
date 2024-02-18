<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Campus Event Scheduler</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .login-container {
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
  <div class="container mt-5">
    <h2 class="text-center mb-4">Login</h2>
    <div class="login-container">
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="register.html">Register here</a></p>
    </div> 
    
  </div>
</body>
</html>
