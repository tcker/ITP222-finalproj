<?php
include '../pages/navbar.php';
?>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-black px-8">

<main class="container mx-auto px-4 pt-20 pb-32 flex-grow">
    <h1 class="text-4xl font-extrabold text-[#FFFFFF] mb-8 text-center">Document your adventure.</h1>


        <section class="bg-[#FFFFFF] rounded-xl shadow-lg p-6 md:p-10 mb-12 border border-gray-200 hover:shadow-xl transition-shadow duration-300 ease-in-out">
            <div class="flex flex-col md:flex-row items-center md:space-x-8">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/rutan.png" alt="Conquering the rapids of the Rutan Islands" class="rounded-lg shadow-md w-full h-auto object-cover border border-gray-100">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-[#333333] mb-4">Conquering the rapids of the Rutan Islands</h2>
                    <p class="text-[#333333] leading-relaxed mb-6">
                        Definitely our craziest journey ever! A beautiful collage of nature. Rapid reaching nearly 50 mph, more than a dozen of waterfalls (various sizes), and some killer rocks gave us the biggest rush. Nothing beats the feeling of complete loss of control! The Rutan Islands also has a lighter, more relaxing side - check out the local villages.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium transition-colors duration-300">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/cliff.jpg" alt="Scaling mountains in Manurai" class="rounded-lg shadow-sm mb-4 w-full h-48 object-cover border border-gray-100">
                <h3 class="text-xl font-semibold text-[#333333] mb-2">Scaling mountains in Manurai</h3>
                <p class="text-[#333333] text-sm leading-relaxed mb-4">
                    Some of the steepest cliffs around! My buddy and I began our 3 day scale above the majestic raging watersf of Nanna
                </p>
                <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                    View Log
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/bike.jpg" alt="Cycling the Irma coastline" class="rounded-lg shadow-sm mb-4 w-full h-48 object-cover border border-gray-100">
                <h3 class="text-xl font-semibold text-[#333333] mb-2">Cycling the Irma coastline</h3>
                <p class="text-[#333333] text-sm leading-relaxed mb-4">
                    Beautiful scenery combined with steep inclines and fast roads allowed for some great cycling. Don't forget the helmet!!
                </p>
                <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                    View Log
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                <img src="http://localhost/ITP222-finalproj/backup/back-end/CSS/Assets/desert.jpg" alt="Desert Exploration" class="rounded-lg shadow-sm mb-4 w-full h-48 object-cover border border-gray-100">
                <h3 class="text-xl font-semibold text-[#333333] mb-2">Desert Exploration: Sahara's Secrets</h3>
                <p class="text-[#333333] text-sm leading-relaxed mb-4">
                    Uncovering ancient mysteries beneath the vast, golden dunes. A journey of solitude and discovery.
                </p>
                <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                    View Log
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </section>
    </main>

</body>
</html>

