<?php
session_start();
?>
<nav class="bg-blue-700 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <a href="home.php" class="text-2xl font-bold">MCB Bank</a>
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="home.php" class="hover:text-gray-200">Home</a>
                <a href="about.php" class="hover:text-gray-200">About</a>
                <a href="services.php" class="hover:text-gray-200">Services</a>
                <a href="contact.php" class="hover:text-gray-200">Contact</a>

                <?php if(isset($_SESSION['user'])): ?>
                <!-- Access the 'name' key of the user array -->

                <a href="logout.php" class="bg-white text-blue-700 px-3 py-1 rounded hover:bg-gray-200">LogIN</a>
                <?php else: ?>
                <a href="login.php" class="hover:text-gray-200">Login</a>
                <?php endif; ?>
            </div>

            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden hidden" id="mobile-menu">
        <a href="home.php" class="block px-4 py-2 hover:bg-blue-600">Home</a>
        <a href="about.php" class="block px-4 py-2 hover:bg-blue-600">About</a>
        <a href="services.php" class="block px-4 py-2 hover:bg-blue-600">Services</a>
        <a href="contact.php" class="block px-4 py-2 hover:bg-blue-600">Contact</a>

        <?php if(isset($_SESSION['user'])): ?>
        <span class="block px-4 py-2 mt-1">Hello, <?php echo $_SESSION['user']['name']; ?></span>
        <a href="logout.php"
            class="block px-4 py-2 bg-white text-blue-700 text-center rounded mt-1 hover:bg-gray-200">Logout</a>
        <?php else: ?>
        <a href="login.php" class="block px-4 py-2 hover:bg-blue-600">Login</a>
        <?php endif; ?>
    </div>
</nav>

<script>
const btn = document.getElementById('menu-btn');
const menu = document.getElementById('mobile-menu');
btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});
</script>