<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    body { font-family: sans-serif; margin: 2em; }
    form { max-width: 400px; margin: auto; }
    label { display: block; margin-top: 1em; }
    input[type=text], input[type=email], input[type=password] {
      width: 100%; padding: 8px; margin-top: 5px;
    }
    button { margin-top: 1em; padding: 10px; width: 100%; }
    .note { font-size: 0.8em; color: #555; }
  </style>
</head>
<body>
  <h2>Create Account</h2>
  <form action="index.php?uri=register" method="POST">
    <label>Username <input type="text" name="username" placeholder="john_doe" required></label>
    <label>Email <input type="email" name="email" placeholder="example@mail.com" required></label>
    <label>Password <input type="password" name="password" placeholder="Min 6 characters" required></label>
    <p class="note">Password must be at least 6 characters long.</p>
    <label><input type="checkbox" required> I agree to the <a href="#">Terms</a> & <a href="#">Privacy</a></label>
    <button type="submit">Sign Up</button>
  </form>
</body>
</html>
