<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - MCB Bank</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Hero Section with curved bottom -->
    <section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-28 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">About MCB Bank</h1>
            <p class="text-lg md:text-2xl drop-shadow-md">Reliable banking services with trust, integrity, and
                innovation.</p>
        </div>
        <div class="absolute bottom-0 w-full overflow-hidden leading-0">
            <svg class="relative block w-full h-20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                viewBox="0 0 1440 54">
                <path fill="#f0f9ff" d="M0,54L1440,0L1440,54L0,54Z"></path>
            </svg>
        </div>
        <div
            class="absolute -top-10 -left-10 w-40 h-40 bg-blue-300 rounded-full mix-blend-multiply opacity-30 animate-pulse">
        </div>
        <div
            class="absolute -bottom-10 -right-10 w-60 h-60 bg-blue-400 rounded-full mix-blend-multiply opacity-20 animate-pulse">
        </div>
    </section>

    <!-- About Content -->
    <section class="max-w-7xl mx-auto px-6 py-24 flex-grow">
        <div
            class="bg-white shadow-2xl rounded-3xl p-10 md:p-16 transform hover:-translate-y-2 transition duration-500 relative overflow-hidden">
            <h2 class="text-4xl font-bold mb-10 text-blue-700 text-center">Who We Are</h2>
            <p class="text-gray-700 mb-6 text-lg leading-relaxed">
                MCB Bank is dedicated to providing reliable banking services to our customers. We offer a wide range of
                financial products, including savings accounts, loans, and online banking solutions. Our mission is to
                empower our customers with convenient and secure banking options.
            </p>
            <p class="text-gray-700 mb-12 text-lg leading-relaxed">
                Established in 1990, MCB Bank has grown to serve thousands of customers nationwide. We value trust,
                integrity, and innovation in all our services.
            </p>

            <div class="md:flex md:space-x-12">
                <!-- Vision -->
                <div class="md:w-1/2 mb-12 md:mb-0 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <div class="bg-blue-700 text-white p-3 rounded-full animate-bounce mr-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 1.343-3 3 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.657-1.343-3-3-3z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-blue-700">Our Vision</h3>
                    </div>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        To be the most customer-centric bank, providing seamless banking experiences and contributing to
                        the economic growth of our community.
                    </p>
                </div>

                <!-- Values -->
                <div class="md:w-1/2 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <div class="bg-blue-700 text-white p-3 rounded-full animate-bounce mr-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
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

    <!-- Footer -->
    <footer class="bg-blue-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h2 class="text-2xl font-bold mb-4">MCB Bank</h2>
                <p class="text-gray-300">Reliable financial solutions tailored for you. Connecting you to a secure
                    banking experience.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Services</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">Savings Account</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">Loans</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">Online Banking</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">FAQ</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition-all duration-300">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition-all duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11 9.95V15.8h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.15 1.8.15v2h-1c-1 0-1.3.62-1.3 1.26V12h2.2l-.35 3H14v6.15A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition-all duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04 4.28 4.28 0 00-7.3 3.9A12.14 12.14 0 013 4.67a4.28 4.28 0 001.32 5.71 4.27 4.27 0 01-1.94-.54v.05a4.28 4.28 0 003.44 4.2 4.3 4.3 0 01-1.93.07 4.28 4.28 0 003.99 2.98A8.58 8.58 0 012 19.54 12.07 12.07 0 008.29 21c7.55 0 11.68-6.25 11.68-11.68 0-.18-.01-.36-.02-.53A8.36 8.36 0 0022.46 6z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition-all duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 2.87 8.16 6.84 9.49.5.09.68-.22.68-.48v-1.7c-2.78.61-3.37-1.34-3.37-1.34-.45-1.15-1.11-1.45-1.11-1.45-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.9 1.55 2.36 1.1 2.94.84.09-.66.35-1.1.63-1.35-2.22-.25-4.55-1.11-4.55-4.95 0-1.09.39-1.99 1.03-2.69-.1-.25-.45-1.26.1-2.63 0 0 .84-.27 2.75 1.02a9.5 9.5 0 015 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.38.1 2.63.64.7 1.03 1.6 1.03 2.69 0 3.85-2.34 4.7-4.57 4.95.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48 3.96-1.33 6.83-5.08 6.83-9.49 0-5.5-4.46-9.96-9.96-9.96z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-blue-700 mt-8 pt-4 text-center text-gray-300 text-sm">
            &copy; 2025 MCB Bank. All Rights Reserved.
        </div>
    </footer>

</body>

</html>