<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@heroicons/vue@2.0.0-beta.6/dist/heroicons.min.js"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-stretch justify-center">

  <div class="flex flex-col md:flex-row w-full h-screen">
    
    <!-- Left Panel -->
    <div class="hidden md:flex md:w-1/2 bg-zinc-900 p-10 flex-col justify-between">
      <div class="text-lg font-semibold flex items-center gap-2">
        <span class="text-xl">⌘</span> Compass
      </div>
      <blockquote class="text-sm text-gray-400 mt-auto">
        "The journey of a thousand miles begins with a single step."  
        <footer class="mt-2 text-xs text-gray-500">- Lao Tzu</footer>
      </blockquote>
    </div>

    <!-- Right Panel -->
    <div class="w-full md:w-1/2 bg-zinc-950 flex items-center justify-center">
      <div class="w-full max-w-md p-8 md:p-10">
        
        <div class="text-center mb-6">
          <h2 class="text-3xl font-bold mb-2">Login to your account</h2>
          <p class="text-sm text-gray-400">Welcome back! Please enter your credentials.</p>
        </div>

        <form action="index.php?uri=authenticate" method="POST" class="space-y-4">
          <input 
            type="text" 
            name="username" 
            placeholder="Username" 
            required 
            class="w-full rounded-md bg-transparent border border-zinc-700 p-2 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-blue-500"
          />
          
          <div class="relative">
          <input 
            type="password" 
            id="password" 
            name="password" 
            placeholder="Password"
            required 
            class="w-full rounded-md bg-transparent border border-zinc-700 p-2 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-blue-500"
          />
            <button 
              type="button" 
              onclick="togglePassword()" 
              class="absolute right-3 top-3 text-gray-400 hover:text-white"
            >
              <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>

          <div class="text-right text-sm">
            <a href="index.php?uri=forgot" class="text-gray-400 hover:underline">Forgot Password?</a>
          </div>

          <button 
            type="submit"
            class="w-full bg-white text-black font-semibold py-2 rounded-md hover:bg-gray-200 transition"
          >
            Login
          </button>

          <p class="text-gray-400 text-sm text-center pt-2">
            Don't have an account? 
            <a href="index.php?uri=signup" class="text-white hover:underline">Sign Up</a>
          </p>
        </form>
      </div>
    </div>

  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const icon = document.getElementById('eye-icon');
      const isPassword = passwordField.type === 'password'
      passwordField.type = isPassword ? 'text' : 'password';

      icon.innerHTML = isPassword 
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.056 10.056 0 012.877-4.43M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3l6 6M3 3l18 18" />`;

    }
  </script>

</body>
</html>
