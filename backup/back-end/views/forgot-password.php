<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center mb-2">Forgot Password</h2>
    <p class="text-center text-sm text-gray-500 mb-6">
      Enter your email below to receive a password reset link.
    </p>

    <form action="index.php?uri=handle-forgot" method="POST">
      <div class="space-y-4">
        <div class="space-y-2">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            id="email"
            name="email"
            type="email"
            placeholder="m@example.com"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
          />
          <p class="text-xs text-gray-500 mt-1">A password reset link will be sent to the provided email address.</p>
        </div>
        <button
          type="submit"
          class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
        >
          Send Reset Link
        </button>
      </div>
    </form>

    <div class="mt-4 text-center text-sm text-gray-500">
      Remembered your password? 
      <a href="index.php?uri=login" class="underline text-blue-600 hover:text-blue-800">
        Go back to login
      </a>
    </div>
  </div>
</body>
</html>
