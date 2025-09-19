<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Check if email exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashed);
            if ($stmt->execute()) {
                header("Location: login.php?registered=1");
                exit;
            } else {
                $error = "Something went wrong.";
            }
            $stmt->close();
        }
        $check->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: "Segoe UI", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-card {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    .register-card h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group label {
      font-weight: 500;
    }
    .form-control {
      padding: 10px;
      font-size: 16px;
    }
    .btn-primary {
      background-color: #1abc9c;
      border: none;
    }
    .btn-primary:hover {
      background-color: #17a589;
    }
    .text-center a {
      color: #1abc9c;
      text-decoration: none;
    }
    .text-center a:hover {
      text-decoration: underline;
    }
    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 15px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="register-card">
  <h2>Register</h2>
  <?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>
  <form method="POST" action="">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" required placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" required placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Register</button>
  </form>
  <div class="text-center mt-3">
    Already have an account? <a href="login.php">Login here</a>
  </div>
</div>

</body>
</html>
