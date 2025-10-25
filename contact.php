<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - MCB Bank</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 flex flex-col min-h-screen">

    <!-- Hero Section with animated shapes -->
    <section
        class="relative bg-gradient-to-r from-blue-800 via-blue-700 to-blue-500 text-white py-24 text-center overflow-hidden shadow-xl">
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <h1
                class="text-5xl md:text-6xl font-extrabold mb-4 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-200 drop-shadow-md">
                Contact <span class="text-yellow-400">MCB Bank</span>
            </h1>
            <p class="text-lg md:text-2xl opacity-90 mb-6">We value your feedback and are here to assist you 24/7.</p>
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

    <!-- Three Column Layout -->
    <section class="max-w-7xl mx-auto px-6 py-20 grid lg:grid-cols-3 md:grid-cols-1 gap-10">

        <!-- Contact Form with Glassmorphism -->
        <div
            class="bg-white/50 backdrop-blur-lg p-8 rounded-3xl shadow-2xl border border-blue-100 hover:scale-105 hover:shadow-2xl transition-transform duration-500">
            <h2
                class="text-3xl font-bold text-blue-700 mb-6 text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-blue-700">
                Send Message</h2>
            <form action="contact_submit.php" method="POST" class="space-y-5">
                <input type="text" name="name" placeholder="Full Name" required
                    class="w-full rounded-lg px-4 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white/70">
                <input type="email" name="email" placeholder="Email Address" required
                    class="w-full rounded-lg px-4 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white/70">
                <input type="text" name="subject" placeholder="Subject" required
                    class="w-full rounded-lg px-4 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white/70">
                <textarea name="message" rows="5" placeholder="Your Message" required
                    class="w-full rounded-lg px-4 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white/70"></textarea>
                <div class="text-center">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-700 to-blue-500 text-white font-semibold px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:shadow-blue-400/50 transition duration-300">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Office Info -->
        <div
            class="bg-blue-700 text-white p-8 rounded-3xl shadow-2xl flex flex-col justify-center hover:scale-105 transition-transform duration-500">
            <h2
                class="text-3xl font-bold mb-6 text-center bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-200">
                Our Office</h2>
            <p class="text-lg mb-4 text-center">Visit or reach us anytime — we’re happy to help!</p>
            <div class="space-y-4 text-lg">
                <p><strong>Email:</strong> info@mcb-bank.com</p>
                <p><strong>Phone:</strong> +880 1234 567 890</p>
                <p><strong>Address:</strong> 45/A Green Road, Dhaka, Bangladesh</p>
            </div>
            <div class="flex justify-center space-x-4 mt-6">
                <a href="https://facebook.com" target="_blank"
                    class="hover:scale-125 transition-transform duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="35" alt="Facebook">
                </a>
                <a href="https://twitter.com" target="_blank" class="hover:scale-125 transition-transform duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="35" alt="Twitter">
                </a>
                <a href="https://instagram.com" target="_blank"
                    class="hover:scale-125 transition-transform duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" width="35" alt="Instagram">
                </a>
            </div>
        </div>

        <!-- Google Map -->
        <div
            class="overflow-hidden rounded-3xl shadow-2xl border border-blue-100 hover:scale-105 transition-transform duration-500">
            <iframe class="w-full h-full min-h-[450px]"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9022022836843!2d90.38542251498114!3d23.750866584589095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b894fb3a70d7%3A0x9af1b91d94d7e57a!2sGreen%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1699902933442!5m2!1sen!2sbd"
                allowfullscreen="" loading="lazy"></iframe>
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
                    <li><a href="#" class="hover:text-blue-300 transition">Savings Account</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition">Loans</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition">Online Banking</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-blue-300 transition">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-blue-300 transition">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11 9.95V15.8h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.15 1.8.15v2h-1c-1 0-1.3.62-1.3 1.26V12h2.2l-.35 3H14v6.15A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04 4.28 4.28 0 00-7.3 3.9A12.14 12.14 0 013 4.67a4.28 4.28 0 001.32 5.71 4.27 4.27 0 01-1.94-.54v.05a4.28 4.28 0 003.44 4.2 4.3 4.3 0 01-1.93.07 4.28 4.28 0 003.99 2.98A8.58 8.58 0 012 19.54 12.07 12.07 0 008.29 21c7.55 0 11.68-6.25 11.68-11.68 0-.18-.01-.36-.02-.53A8.36 8.36 0 0022.46 6z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-blue-300 transition">
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