<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-stretch justify-center">
  <div class="flex flex-col md:flex-row w-full h-screen">
  <div class="hidden md:flex md:w-1/2 bg-zinc-900 p-0 relative overflow-hidden">
    <div id="slideshow" class="absolute inset-0 z-0">
      <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/arthur.png" class="fade-img absolute w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
      <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/gost.jpg" class="fade-img absolute w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
      <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/eld.jpg" class="fade-img absolute w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
      <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/silenthill.png" class="fade-img absolute w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
      <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/japan.jpg" class="fade-img absolute w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    </div>

    <div class="z-10 relative p-10 flex flex-col justify-between bg-transparent">
      <div class="text-3xl font-semibold flex items-center gap-2">
        <span class="text-4xl">⌘ Compass
      </div>
      <blockquote class="text-sm text-white mt-auto">
        "The journey of a thousand miles begins with a single step."  
        <footer class="mt-2 text-xs text-white">- Lao Tzu</footer>
      </blockquote>
    </div>
  </div>

    <div class="w-full md:w-1/2 bg-zinc-950 p-8 md:p-16 flex items-center justify-center">
      <div class="w-full max-w-md p-8 md:p-10">
        <div class="text-center mb-6">
        <h2 class="text-3xl font-bold mb-2">Create an Account</h2>
        <p class="text-sm text-gray-400">Sign up to get started with your journey.</p>
      </div>

      <form action="index.php?uri=register" method="POST" class="space-y-4">
        <input 
          type="text" 
          name="username" 
          placeholder="Username" 
          required 
          class="w-full rounded-md bg-transparent border border-zinc-700 p-2 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-blue-500"
        />

        <input 
          type="email" 
          name="email" 
          placeholder="JohnDoe@gmail.com" 
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
            class="absolute right-3 top-3 text-sm text-gray-400 hover:text-white"
          >
            <!-- Eye Open -->
            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7
                  a10.056 10.056 0 012.877-4.43M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3
                  m3-3l6 6M3 3l18 18" />
            </svg>

            <!-- Eye Slash (Initially hidden) -->
            <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
          <p class="text-xs text-gray-500 mt-1 ml-1">Password must be at least 6 characters with special characters.</p>
        </div>

         

        <div class="flex items-start space-x-2 text-sm text-gray-300">
          <input type="checkbox" required class="mt-1 h-4 w-4 text-white bg-zinc-800 border-zinc-600 rounded" />
          <label>I agree to the <a href="javascript:void(0);" onclick="toggleModal()" class="text-white underline">Terms & Privacy</a> </label>
        </div>

        <button 
          type="submit"
          class="w-full bg-white text-black font-semibold py-2 rounded-md hover:bg-gray-200 transition"
        >
          Sign Up
        </button>

        <p class="text-gray-400 text-sm text-center">
          Already have an account? 
          <a href="index.php?uri=login" class="text-white hover:underline">Login</a>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="termsModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
  <div class="bg-zinc-900 rounded-xl shadow-lg max-w-lg w-full p-6 relative">
    <button 
      onclick="toggleModal()" 
      class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl font-bold"
      aria-label="Close"
    >
      &times;
    </button>
    <h2 class="text-xl font-bold mb-4 text-white">Terms & Privacy Policy</h2>
    <div class="text-sm text-gray-300 max-h-60 overflow-y-auto space-y-4">
      <p>
        By creating an account, you agree to our Travel Terms and Privacy Policy. We’re dedicated to making your journey safe, enjoyable, and respectful of your privacy.
      </p>
      <p>
        <strong>Terms of Service:</strong> You must be 18 years or older to use our travel platform. Use the site responsibly no booking or sharing of illegal or harmful content. We reserve the right to suspend accounts violating our guidelines to keep the community safe and fun.
      </p>
      <p>
        <strong>Privacy Policy:</strong> We collect your username, email, and password to personalize your travel experience and manage your bookings. Your information is protected with strong security measures and won’t be shared with third parties without your permission.
      </p>
      <p>
        Ready to explore? If you have questions, our travel support team is here to help!
      </p>
    </div>
    <div class="mt-6 text-right">
      <button 
        onclick="toggleModal()" 
        class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200 transition"
      >
        Close
      </button>
    </div>
  </div>
</div>


    <script>
        function togglePassword() {
          const password = document.getElementById('password');
          const eyeOpen = document.getElementById('eye-open');
          const eyeClosed = document.getElementById('eye-closed');

          const isPassword = password.type === 'password';
          password.type = isPassword ? 'text' : 'password';

          eyeOpen.classList.toggle('hidden', isPassword);
          eyeClosed.classList.toggle('hidden', !isPassword);
        }

        function toggleModal() {
          const modal = document.getElementById('termsModal');
          modal.classList.toggle('hidden');
        }

          let current = 0;
          const images = document.querySelectorAll("#slideshow .fade-img");

          function showNextImage() {
            images.forEach((img, i) => {
              img.classList.remove("opacity-100");
              img.classList.add("opacity-0");
            });

            images[current].classList.remove("opacity-0");
            images[current].classList.add("opacity-100");

            current = (current + 1) % images.length;
          }

          showNextImage();
          setInterval(showNextImage, 4000); // change every 4 seconds
    </script>


</body>
</html>
