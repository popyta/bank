<?php
session_start();
if(!isset($_SESSION['userId'])){
    header('location:login.php');
    exit();
}

// ✅ Define constant safely
if (!defined('bankName')) {
    define('bankName', 'MCB Bank');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <?php
    require 'assets/autoloader.php';
    require 'assets/db.php';
    require 'assets/function.php';
    ?>
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
    }

    body {
        display: flex;
        flex-direction: column;
    }

    /* Floating shapes */
    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.15;
        animation: float 10s ease-in-out infinite;
        z-index: 0;
    }

    .shape1 {
        width: 250px;
        height: 250px;
        background: #ffd700;
        top: -50px;
        left: -50px;
    }

    .shape2 {
        width: 300px;
        height: 300px;
        background: #ff6b6b;
        bottom: -100px;
        right: -100px;
        animation-delay: 2s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) translateX(0) rotate(0deg);
        }

        50% {
            transform: translateY(-30px) translateX(30px) rotate(45deg);
        }
    }

    /* Navbar styling */
    .navbar {
        z-index: 10;
        background-color: #1e3a8a !important;
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
        color: white !important;
    }

    /* Card styling */
    .card {
        position: relative;
        z-index: 10;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        margin-bottom: 30px;
    }

    .card-header,
    .card-footer {
        background-color: #1e3a8a;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .alert {
        border-radius: 8px;
        padding: 12px 20px;
        margin-bottom: 12px;
        font-size: 14px;
    }

    /* Footer styling */
    footer {
        background-color: #1e3a8a;
        color: white;
        padding: 20px 0;
        width: 100%;
        position: relative;
        z-index: 10;
        margin-top: auto;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        text-align: left;
        padding: 0 20px;
    }

    .footer-column h5 {
        color: #ffd700;
        margin-bottom: 15px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 8px;
    }

    .footer-column ul li a {
        color: white;
        text-decoration: none;
    }

    .footer-column ul li a:hover {
        color: #ffd700;
        text-decoration: underline;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        margin: 0 8px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #ffd700;
    }

    .footer-bottom {
        text-align: center;
        border-top: 1px solid #444;
        margin-top: 15px;
        padding-top: 10px;
        font-size: 13px;
    }

    .footer-bottom a {
        color: #ffd700;
        text-decoration: none;
    }

    .footer-bottom a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <!-- Floating shapes -->
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" alt="">
            <?php echo bankName; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="accounts.php">Accounts</a></li>
                <li class="nav-item active"><a class="nav-link" href="statements.php">Account Statements</a></li>
                <li class="nav-item"><a class="nav-link" href="transfer.php">Funds Transfer</a></li>
            </ul>
            <?php include 'sideButton.php'; ?>
        </div>
    </nav>

    <br><br><br>
    <div class="container flex-grow-1">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                Transaction made against your account
            </div>
            <div class="card-body">
                <?php 
                $array = $con->query("SELECT * FROM transaction WHERE userId = '$userData[id]' ORDER BY date DESC");
                if ($array->num_rows > 0) {
                    while ($row = $array->fetch_assoc()) {
                        if ($row['action'] == 'withdraw') {
                            echo "<div class='alert alert-secondary'>You withdrew Rs.$row[debit] from your account at $row[date]</div>";
                        }
                        if ($row['action'] == 'deposit') {
                            echo "<div class='alert alert-success'>You deposited Rs.$row[credit] in your account at $row[date]</div>";
                        }
                        if ($row['action'] == 'deduction') {
                            echo "<div class='alert alert-danger'>Deduction of Rs.$row[debit] made from your account at $row[date] for $row[other]</div>";
                        }
                        if ($row['action'] == 'transfer') {
                            echo "<div class='alert alert-warning'>Transfer of Rs.$row[debit] made from your account at $row[date] to account no.$row[other]</div>";
                        }
                    }
                } else {
                    echo "<div class='alert alert-info'>No transactions found.</div>";
                }
                ?>
            </div>
            <div class="card-footer">
                <?php echo bankName; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h5>Contact Us</h5>
                <p><strong>Email:</strong> info@mcb-bank.com</p>
                <p><strong>Phone:</strong> +880 1234 567 890</p>
                <p><strong>Address:</strong> 45/A Green Road, Dhaka, Bangladesh</p>
            </div>

            <div class="footer-column">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="feedback.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h5>Follow Us</h5>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. All Rights Reserved. | Developed by <a
                href="#">Popy Rani Talukder</a>
        </div>
    </footer>

</body>

</html>