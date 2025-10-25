<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - MCB Bank</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 flex flex-col min-h-screen">

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">About MCB Bank</h1>
            <p class="text-lg md:text-2xl drop-shadow-md">Reliable banking services with trust, integrity, and
                innovation.</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="max-w-7xl mx-auto px-6 py-16 flex-1">
        <div class="bg-white shadow-2xl rounded-3xl p-10 md:p-16">
            <h2 class="text-4xl font-bold mb-8 text-blue-700 text-center">Who We Are</h2>
            <p class="text-gray-700 mb-6 text-lg leading-relaxed">
                MCB Bank is dedicated to providing reliable banking services to our customers.
                We offer a wide range of financial products, including savings accounts, loans,
                and online banking solutions. Our mission is to empower our customers with
                convenient and secure banking options.
            </p>
            <p class="text-gray-700 mb-8 text-lg leading-relaxed">
                Established in 1990, MCB Bank has grown to serve thousands of customers nationwide.
                We value trust, integrity, and innovation in all our services.
            </p>

            <div class="md:flex md:space-x-10">
                <!-- Vision -->
                <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <svg class="w-10 h-10 text-blue-700 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 1.343-3 3 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                        </svg>
                        <h3 class="text-2xl font-semibold text-blue-700">Our Vision</h3>
                    </div>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        To be the most customer-centric bank, providing seamless banking experiences
                        and contributing to the economic growth of our community.
                    </p>
                </div>

                <!-- Values -->
                <div class="md:w-1/2 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <svg class="w-10 h-10 text-blue-700 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <h3 class="text-2xl font-semibold text-blue-700">Our Values</h3>
                    </div>
                    <ul class="list-disc list-inside text-gray-700 text-lg space-y-2 leading-relaxed">
                        <li>Integrity and Transparency</li>
                        <li>Customer Focus</li>
                        <li>Innovation and Technology</li>
                        <li>Community Responsibility</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</body>

</html>