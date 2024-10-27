<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TK 4</title>
</head>
<body>
  <h1>Login</h1>
  <form action="index.php" method="POST">
  <label for="username">Username:</label>
  <input type="text" id="username" name="nama_pengguna" required><br><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>

  <button type="submit">Login</button>
</form>
</body>
</html>