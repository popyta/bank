<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}

if (!defined('bankName')) {
    define('bankName', 'MCB Bank');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Banking</title>
    <?php
    require 'assets/autoloader.php';
    require 'assets/db.php';
    require 'assets/function.php';
    ?>
    <style>
    body {
        background: #D0E7FF;
        /* ✅ Updated body color */
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    /* Footer styles */
    .footer {
        background-color: #222;
        color: #fff;
        padding: 40px 0 20px;
        width: 100%;
        margin-top: auto;
    }

    .footer-sections {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        text-align: left;
    }

    .footer-column {
        min-width: 200px;
        margin: 10px;
    }

    .footer-column h5 {
        color: #96D678;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-column ul li {
        margin: 5px 0;
    }

    .footer a {
        color: #ddd;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer a:hover {
        color: #96D678;
    }

    .footer img {
        width: 35px;
        height: 35px;
        margin: 0 5px;
        transition: transform 0.3s;
    }

    .footer img:hover {
        transform: scale(1.1);
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #ccc;
    }

    .card {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <?php echo bankName; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item active"><a class="nav-link" href="accounts.php">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="statements.php">Account Statements</a></li>
                <li class="nav-item"><a class="nav-link" href="transfer.php">Funds Transfer</a></li>
            </ul>
            <?php include 'sideButton.php'; ?>
        </div>
    </nav>

    <div style="margin-top:80px;"></div>

    <div class="container flex-grow-1">
        <div class="card w-75 mx-auto">
            <div class="card-header text-center">Notification from Bank</div>
            <div class="card-body">
                <?php 
                $array = $con->query("SELECT * FROM notice WHERE userId = '$_SESSION[userId]' ORDER BY date DESC");
                if ($array->num_rows > 0) {
                    while ($row = $array->fetch_assoc()) {
                        echo "<div class='alert alert-success'>{$row['notice']}</div>";
                    }
                } else {
                    echo "<div class='alert alert-info'>Notice box empty</div>";
                }
                ?>
            </div>
            <div class="card-footer text-muted text-center"><?php echo bankName; ?></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-sections">
            <div class="footer-column">
                <h5>Contact Us</h5>
                <p>Email: info@mcb-bank.com</p>
                <p>Phone: +880 1234 567 890</p>
                <p>Address: 45/A Green Road, Dhaka, Bangladesh</p>
            </div>

            <div class="footer-column">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="feedback.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h5>Follow Us</h5>
                <a href="https://facebook.com" target="_blank"><img
                        src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
                <a href="https://twitter.com" target="_blank"><img
                        src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
                <a href="https://instagram.com" target="_blank"><img
                        src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram"></a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. All Rights Reserved. | Developed by Popy Rani
            Talukder
        </div>
    </footer>
</body>

</html>