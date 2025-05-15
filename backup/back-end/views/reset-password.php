<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Token Valid</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="flex flex-col items-center space-y-8 px-4 w-full max-w-md">

    <div class="bg-white p-6 rounded-lg shadow text-center w-full">
      <p class="text-lg font-medium text-gray-800">
        Token valid for: <span class="text-blue-600"><?= htmlspecialchars($email) ?></span>
      </p>
    </div>

    <div class="w-full bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center mb-2">Reset Password</h2>
      <p class="text-center text-sm text-gray-500 mb-6">
        Enter a new password to reset your account.
      </p>

      <!-- Error message container -->
      <div id="error-message" class="hidden mb-4 p-3 bg-red-100 text-red-700 rounded"></div>

      <form id="reset-password-form" action="index.php?uri=handle-reset" method="POST" class="space-y-4" novalidate>
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>" />

        <div class="space-y-2">
          <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
          <input
            id="new_password"
            name="new_password"
            type="password"
            placeholder="Enter a new password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
            autocomplete="new-password"
          />
        </div>

        <button
          type="submit"
          class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
        >
          Reset Password
        </button>
      </form>
    </div>
    
  </div>

  <script>
    const form = document.getElementById('reset-password-form');
    const errorDiv = document.getElementById('error-message');

    form.addEventListener('submit', (e) => {
      errorDiv.classList.add('hidden');
      errorDiv.innerText = '';

      const password = form.new_password.value;
      const errors = [];

      if (password.length < 6) {
        errors.push("Password must be at least 6 characters.");
      }
      if (!/[A-Z]/.test(password)) {
        errors.push("Password must contain at least one uppercase letter.");
      }
      if (!/[a-z]/.test(password)) {
        errors.push("Password must contain at least one lowercase letter.");
      }
      if (!/\d/.test(password)) {
        errors.push("Password must contain at least one number.");
      }
      if (!/[\W_]/.test(password)) {
        errors.push("Password must contain at least one special character.");
      }

      if (errors.length > 0) {
        e.preventDefault(); 
        errorDiv.innerHTML = errors.map(err => `<p>${err}</p>`).join('');
        errorDiv.classList.remove('hidden');
      }
    });
  </script>

</body>
</html>
