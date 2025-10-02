<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname   = trim($_POST["firstname"]);
    $middlename  = trim($_POST["middlename"]);
    $lastname    = trim($_POST["lastname"]);
    $suffix      = trim($_POST["suffix"]);
    $student_id  = trim($_POST["student_id"]);
    $batch       = trim($_POST["batch"]);
    $technology  = trim($_POST["technology"]);
    $email       = trim($_POST["email"]);
    $password    = trim($_POST["password"]);

    if ($firstname === "" || $lastname === "" || $student_id === "" || $batch === "" || $technology === "" || $email === "" || $password === "") {
        $error = "Please fill in all required fields.";
    } else {
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users 
                (firstname, middlename, lastname, suffix, student_id, batch, technology, email, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $firstname, $middlename, $lastname, $suffix, $student_id, $batch, $technology, $email, $hashed);

            if ($stmt->execute()) {
                header("Location: login.php?registered=1");
                exit;
            } else {
                $error = "Something went wrong. Please try again.";
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
  <style>
    body {
      font-family: Segoe UI, sans-serif;
      background-color:rgb(67, 91, 116);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 420px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    input,
    select,
    button {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      background: #1abc9c;
      color: #fff;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background: #17a589;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Create Account</h2>
    <?php if (!empty($error)): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
      <input type="text" name="firstname" placeholder="First Name" required>
      <input type="text" name="middlename" placeholder="Middle Name">
      <input type="text" name="lastname" placeholder="Last Name" required>
      <input type="text" name="suffix" placeholder="Suffix (Jr., Sr., etc.)">
      <input type="text" name="student_id" placeholder="Student ID" required>
      <input type="text" name="batch" placeholder="Batch (e.g., 2025)" required>
      <select name="technology" required>
        <option value="">Select Technology</option>
        <option value="Computer Engineering">Computer Engineering</option>
        <option value="Electrical">Electrical Engineering</option>
        <option value="Electronics">Electronics Engineering</option>
        <option value="Mechanical">Mechanical Engineering</option>
      </select>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <div style="text-align:center;margin-top:12px">Already have an account? <a href="login.php">Login</a></div>
  </div>
</body>
</html>
