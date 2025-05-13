<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    <form action="index.php?uri=authenticate" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Username or Email</label>
        <input type="text" name="username" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
      </div>
      <div class="flex items-center space-x-2">
        <input type="checkbox" onclick="togglePassword(this)" class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
        <label class="text-sm text-gray-600">Show Password</label>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">Login</button>
      <div class="text-right text-sm">
        <a href="index.php?uri=forgot" class="text-blue-500 hover:underline">Forgot Password?</a>
      </div>
      <div class="text-center text-sm text-gray-600 pt-4">
        Don't have an account? 
        <a href="index.php?uri=signup" class="text-blue-600 hover:underline">Create Account</a>
      </div>
    </form>
  </div>

  <script>
    function togglePassword(checkbox) {
      const pwd = document.querySelector('input[name="password"]');
      pwd.type = checkbox.checked ? 'text' : 'password';
    }
  </script>
</body>
</html>
