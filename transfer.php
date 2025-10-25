<?php
session_start();
if(!isset($_SESSION['userId'])){
    header('location:login.php');
    exit();
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #0f172a, #1e3a8a);
        color: white;
        scroll-behavior: smooth;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    /* Floating gradient shapes */
    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        animation: float 12s ease-in-out infinite;
        z-index: 0;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, rgba(30, 58, 138, 0.1) 100%);
    }

    .shape1 {
        width: 250px;
        height: 250px;
        top: -50px;
        left: -50px;
    }

    .shape2 {
        width: 300px;
        height: 300px;
        bottom: -100px;
        right: -100px;
        animation-delay: 3s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) translateX(0) rotate(0deg);
        }

        50% {
            transform: translateY(-40px) translateX(40px) rotate(45deg);
        }
    }

    /* Navbar */
    .navbar {
        z-index: 10;
        background: linear-gradient(90deg, #1e3a8a, #3b82f6) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: background 0.5s;
    }

    .navbar:hover {
        background: linear-gradient(90deg, #3b82f6, #2563eb) !important;
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
        color: white !important;
        transition: color 0.3s;
    }

    .navbar .nav-link:hover {
        color: #ffd700 !important;
    }

    /* Glass Card */
    .card {
        position: relative;
        z-index: 10;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        border-radius: 16px;
        margin-bottom: 30px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }

    .card-header,
    .card-footer {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        font-weight: bold;
        text-align: center;
    }

    /* Alert Boxes */
    .alert {
        border-left: 5px solid #ffd700;
        background: rgba(255, 255, 255, 0.05);
        color: white;
        border-radius: 8px;
        padding: 12px 20px;
        margin-bottom: 12px;
        font-size: 14px;
        transition: transform 0.2s;
    }

    .alert:hover {
        transform: translateX(5px);
    }

    .alert-success {
        border-color: #16a34a;
    }

    .alert-danger {
        border-color: #dc2626;
    }

    .alert-warning {
        border-color: #facc15;
    }

    .alert-info {
        border-color: #3b82f6;
    }

    /* Footer */
    footer {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 30px 0;
        width: 100%;
        position: relative;
        z-index: 10;
        margin-top: auto;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.3);
        transition: background 0.5s;
    }

    footer:hover {
        background: linear-gradient(90deg, #3b82f6, #2563eb);
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        text-align: left;
        padding: 0 20px;
    }

    .footer-column h5 {
        color: white;
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
        transition: color 0.3s;
    }

    .footer-column ul li a:hover {
        color: #ffd700;
        text-decoration: underline;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        margin: 0 8px;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #ffd700;
    }

    .footer-bottom {
        text-align: center;
        border-top: 1px solid rgba(255, 255, 255, 0.3);
        margin-top: 15px;
        padding-top: 10px;
        font-size: 13px;
    }

    .footer-bottom a {
        color: #ffd700;
        text-decoration: none;
        transition: text-decoration 0.3s;
    }

    .footer-bottom a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            text-align: center;
        }

        .card {
            width: 90% !important;
        }
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
                        if ($row['action'] == 'withdraw') echo "<div class='alert alert-secondary'>You withdrew Rs.$row[debit] at $row[date]</div>";
                        if ($row['action'] == 'deposit') echo "<div class='alert alert-success'>You deposited Rs.$row[credit] at $row[date]</div>";
                        if ($row['action'] == 'deduction') echo "<div class='alert alert-danger'>Deduction of Rs.$row[debit] for $row[other] at $row[date]</div>";
                        if ($row['action'] == 'transfer') echo "<div class='alert alert-warning'>Transfer of Rs.$row[debit] to account $row[other] at $row[date]</div>";
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