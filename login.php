<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Include bootstrap if template uses bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* custom style to match your screenshot */

    body {
      background-color: #f5f7fa;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: #2d3a4b;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    .sidebar .logo {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 40px;
      text-align: center;
    }

    .sidebar nav a {
      color: #ffffff;
      text-decoration: none;
      margin: 15px 0;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }

    .sidebar nav a:hover {
      background-color: #1f2a38;
    }

    .main-content {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-card h2 {
      margin-bottom: 30px;
      color: #333333;
      font-weight: 600;
      text-align: center;
    }

    .login-card .form-group {
      margin-bottom: 20px;
    }

    .login-card label {
      font-weight: 500;
      color: #555555;
    }

    .login-card input[type="email"],
    .login-card input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
    }

    .login-card input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #1abc9c;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-card input[type="submit"]:hover {
      background-color: #17a589;
    }

    .login-card .links {
      margin-top: 15px;
      text-align: center;
    }

    .login-card .links a {
      color: #1abc9c;
      text-decoration: none;
      margin: 0 5px;
    }

    .login-card .links a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

  <div class="sidebar">
    <div class="logo">Your Logo</div>
    <nav>
      <a href="#">Dashboard</a>
      <a href="#">Components</a>
      <a href="#">Forms & Table</a>
      <a href="#">Charts</a>
      <!-- etc -->
    </nav>
  </div>

  <div class="main-content">
    <div class="login-card">
      <h2>Login</h2>
      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required placeholder="Enter password">
        </div>
        <input type="submit" value="Login">
      </form>
      <div class="links">
        <a href="register.php">Signup</a> | <a href="#">Forgot Password?</a>
      </div>
    </div>
  </div>

</body>
</html>
