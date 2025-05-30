<?php
include '../pages/navbar.php';
?>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black px-8">

    <main class="container mx-auto px-4 pt-20 pb-32 flex-grow">
        <h1 class="text-4xl font-extrabold text-[#FFFFFF] mb-8 text-center">Our Latest Travel Packages.</h1>

        <section class="bg-[#FFFFFF] rounded-xl shadow-lg p-6 mb-12 border border-gray-200">
            <p class="text-[#333333] leading-relaxed text-center text-lg">
                Compass works hard to bring you the best possible trips for your rugged lifestyle. Here you'll find our latest travel packages suited for the adventure spirit.
            </p>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php /* foreach ($travelPackages as $package): */ ?>

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-3xl text-[#993300] mr-4">🏄‍♂️</span>
                        <h3 class="text-xl font-semibold text-[#333333]">Hurricane Swells Surf Trip</h3>
                    </div>
                    <p class="text-[#333333] text-sm leading-relaxed mb-4">
                        Be ready to go on a moment's notice. We will call you when the surf is pumping and fly you out for five mornings of hurricane inspired summertime swells.
                    </p>
                </div>
                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-[#006699]">$960</span>
                        <span class="text-xs text-[#333333]">includes lodging, food, and airfare.</span>
                    </div>
                    <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                        MORE DETAILS
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-3xl text-[#993300] mr-4">🚴‍♀️</span>
                        <h3 class="text-xl font-semibold text-[#333333]">Irma Coastline Cycling</h3>
                    </div>
                    <p class="text-[#333333] text-sm leading-relaxed mb-4">
                        Beautiful scenery combined with steep inclines and fast roads allowed for some great cycling. Don't forget the helmet!!
                    </p>
                </div>
                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-[#006699]">$1490</span>
                        <span class="text-xs text-[#333333]">includes lodging, food, and airfare.</span>
                    </div>
                    <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                        MORE DETAILS
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="bg-[#FFFFFF] rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-3xl text-[#993300] mr-4">⛰️</span>
                        <h3 class="text-xl font-semibold text-[#333333]">Devil's Tower Climbing Trip</h3>
                    </div>
                    <p class="text-[#333333] text-sm leading-relaxed mb-4">
                        In this three day trip you'll scale the majestic cliffs of beautiful Devil's Tower, Wyoming.
                    </p>
                </div>
                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-[#006699]">$740</span>
                        <span class="text-xs text-[#333333]">includes lodging, food, and airfare.</span>
                    </div>
                    <a href="#" class="inline-flex items-center text-[#993300] hover:text-[#006699] font-medium text-sm transition-colors duration-300">
                        MORE DETAILS
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
