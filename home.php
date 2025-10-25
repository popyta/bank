<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCB Bank - Home</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 flex flex-col min-h-screen">

    <!-- Hero Section with animated shapes -->
    <section
        class="relative bg-gradient-to-r from-blue-800 via-blue-700 to-blue-600 text-white text-center py-28 overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <h1
                class="text-5xl md:text-6xl font-extrabold mb-4 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-200 drop-shadow-md">
                Welcome to MCB Bank
            </h1>
            <p class="text-lg md:text-2xl opacity-90 mb-8">
                Your trusted partner for secure, fast, and reliable banking services.
            </p>
            <a href="services.php"
                class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300">
                Explore Services
            </a>
        </div>

        <!-- Floating animated shapes -->
        <div
            class="absolute -top-10 -left-10 w-40 h-40 bg-yellow-300 rounded-full mix-blend-multiply opacity-30 animate-pulse">
        </div>
        <div
            class="absolute -bottom-20 -right-10 w-60 h-60 bg-blue-400 rounded-full mix-blend-multiply opacity-20 animate-pulse">
        </div>

        <!-- Curved bottom -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-0">
            <svg class="relative block w-full h-20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                viewBox="0 0 1440 54">
                <path fill="#f0f9ff" d="M0,54L1440,0L1440,54L0,54Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-3 gap-10">
        <!-- Card 1 -->
        <div
            class="bg-white rounded-3xl p-8 shadow-xl text-center hover:scale-105 hover:shadow-2xl transition duration-500 border-t-4 border-blue-600 relative overflow-hidden">
            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048910.png" alt="Savings" class="w-20 mx-auto mb-6">
            <h3
                class="text-2xl font-bold text-blue-700 mb-3 bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-blue-700">
                Savings Accounts</h3>
            <p class="text-gray-600 mb-4">Open a savings account and enjoy easy access to your funds with high interest
                rates.</p>
            <a href="services.php" class="text-blue-600 font-semibold hover:underline">Learn More →</a>
        </div>

        <!-- Card 2 -->
        <div
            class="bg-white rounded-3xl p-8 shadow-xl text-center hover:scale-105 hover:shadow-2xl transition duration-500 border-t-4 border-green-600 relative overflow-hidden">
            <img src="https://cdn-icons-png.flaticon.com/512/3143/3143482.png" alt="Loans" class="w-20 mx-auto mb-6">
            <h3
                class="text-2xl font-bold text-green-700 mb-3 bg-clip-text text-transparent bg-gradient-to-r from-green-500 to-green-700">
                Personal Loans</h3>
            <p class="text-gray-600 mb-4">Get quick loans with minimal paperwork and flexible repayment options.</p>
            <a href="services.php" class="text-green-600 font-semibold hover:underline">Learn More →</a>
        </div>

        <!-- Card 3 -->
        <div
            class="bg-white rounded-3xl p-8 shadow-xl text-center hover:scale-105 hover:shadow-2xl transition duration-500 border-t-4 border-yellow-500 relative overflow-hidden">
            <img src="https://cdn-icons-png.flaticon.com/512/3418/3418886.png" alt="Online Banking"
                class="w-20 mx-auto mb-6">
            <h3
                class="text-2xl font-bold text-yellow-600 mb-3 bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600">
                Online Banking</h3>
            <p class="text-gray-600 mb-4">Access your account anytime, anywhere — securely and conveniently.</p>
            <a href="services.php" class="text-yellow-600 font-semibold hover:underline">Learn More →</a>
        </div>
    </section>

    <!-- About Short Section -->
    <section
        class="bg-gradient-to-r from-blue-800 via-blue-700 to-blue-800 text-white py-16 text-center relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-6 relative z-10">
            <h2
                class="text-4xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-200">
                Trusted by Millions of Customers</h2>
            <p class="text-lg opacity-90 mb-8">MCB Bank provides digital and traditional banking services with security,
                speed, and satisfaction.</p>
            <a href="about.php"
                class="bg-yellow-400 text-blue-900 font-semibold px-8 py-3 rounded-full hover:bg-yellow-500 transition shadow-lg">
                About Us
            </a>
        </div>
        <div
            class="absolute top-0 right-0 w-40 h-40 bg-yellow-300 rounded-full mix-blend-multiply opacity-20 animate-pulse">
        </div>
        <div
            class="absolute bottom-0 left-0 w-60 h-60 bg-blue-400 rounded-full mix-blend-multiply opacity-20 animate-pulse">
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h2 class="text-2xl font-bold mb-4 text-yellow-400">MCB Bank</h2>
                <p class="text-gray-300 leading-relaxed">
                    Reliable financial solutions tailored for you. Connecting you to a secure banking experience.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 text-yellow-400">Services</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-yellow-300 transition">Savings Account</a></li>
                    <li><a href="#" class="hover:text-yellow-300 transition">Loans</a></li>
                    <li><a href="#" class="hover:text-yellow-300 transition">Online Banking</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 text-yellow-400">Support</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-yellow-300 transition">Contact Us</a></li>
                    <li><a href="#" class="hover:text-yellow-300 transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-yellow-300 transition">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 text-yellow-400">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-yellow-300 transition"><i class="fab fa-facebook-f text-2xl"></i></a>
                    <a href="#" class="hover:text-yellow-300 transition"><i class="fab fa-twitter text-2xl"></i></a>
                    <a href="#" class="hover:text-yellow-300 transition"><i class="fab fa-github text-2xl"></i></a>
                </div>
            </div>
        </div>

        <div class="border-t border-blue-700 mt-8 pt-4 text-center text-gray-400 text-sm">
            &copy; 2025 MCB Bank. All Rights Reserved.
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>