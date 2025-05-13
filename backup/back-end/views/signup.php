<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>
    <form action="index.php?uri=register" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" placeholder="john_doe" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" placeholder="example@mail.com" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" placeholder="Min 6 characters" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" />
        <p class="text-xs text-gray-500 mt-1">Password must be at least 6 characters long.</p>
      </div>
      <div class="flex items-center space-x-2">
        <input type="checkbox" required class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
        <label class="text-sm text-gray-600">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms</a> & <a href="#" class="text-blue-600 hover:underline">Privacy</a></label>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">Sign Up</button>
      <div class="text-center text-sm text-gray-600 pt-4">
        Already have an account? 
        <a href="index.php?uri=login" class="text-blue-600 hover:underline">Go to Login</a>
      </div>
    </form>
  </div>
</body>
</html>
