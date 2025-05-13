<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body { font-family: sans-serif; margin: 2em; }
    form { max-width: 400px; margin: auto; }
    label { display: block; margin-top: 1em; }
    input[type=text], input[type=password] {
      width: 100%; padding: 8px; margin-top: 5px;
    }
    button { margin-top: 1em; padding: 10px; width: 100%; }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form action="index.php?uri=authenticate" method="POST">
    <label>Username or Email <input type="text" name="username" required></label>
    <label>Password <input type="password" name="password" required></label>
    <label><input type="checkbox" onclick="togglePassword(this)"> Show Password</label>
    <button type="submit">Login</button>
    <p><a href="#">Forgot Password?</a></p>
  </form>
  <script>
    function togglePassword(checkbox) {
      const pwd = document.querySelector('input[name="password"]');
      pwd.type = checkbox.checked ? 'text' : 'password';
    }
  </script>
</body>
</html>
