<?php
session_start();
if (!isset($_SESSION['userId'])) { 
    header('location:login.php');
    exit();
}

// BANKNAME already defined in db.php, so no need to define again
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking</title>

    <?php 
    require 'assets/autoloader.php'; 
    require 'assets/db.php'; 
    require 'assets/function.php'; 
    ?>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
    body {
        background: #96D678;
        background-size: 100%;
    }

    footer {
        background-color: #212529;
        color: white;
        text-align: center;
        padding: 40px 0 10px 0;
        margin-top: 30px;
        font-size: 15px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: 1000px;
        margin: auto;
        gap: 50px;
        text-align: left;
    }

    .footer-column h5 {
        margin-bottom: 15px;
        font-size: 18px;
        color: #0dcaf0;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 8px;
    }

    .footer-column ul li a {
        color: #ccc;
        text-decoration: none;
    }

    .footer-column ul li a:hover {
        text-decoration: underline;
        color: #0dcaf0;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        margin: 0 8px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #0dcaf0;
    }

    .footer-bottom {
        border-top: 1px solid #444;
        margin-top: 20px;
        padding-top: 10px;
        font-size: 14px;
    }

    .footer-bottom a {
        color: #0dcaf0;
        text-decoration: none;
    }

    .footer-bottom a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <?php echo BANKNAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="accounts.php">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="statements.php">Account Statements</a></li>
                <li class="nav-item"><a class="nav-link" href="transfer.php">Funds Transfer</a></li>
            </ul>
            <?php include 'sideButton.php'; ?>
        </div>
    </nav>
    <br><br><br>

    <!-- Main Content -->
    <div class="row w-100">
        <div class="col" style="padding:22px;padding-top:0">
            <div class="jumbotron shadowBlack" style="padding:25px;min-height:241px;max-height:241px">
                <h4 class="display-5">Welcome to <?php echo BANKNAME; ?></h4>
                <p class="lead alert alert-warning"><b>Latest Notification:</b>
                    <?php 
                    $array = $con->query("SELECT * FROM notice WHERE userId = '$_SESSION[userId]' ORDER BY date DESC");
                    if ($array->num_rows > 0) {
                        $row = $array->fetch_assoc();
                        echo $row['notice'];
                    } else {
                        echo "<div class='alert alert-info'>Notice box empty</div>";
                    }
                    ?>
                </p>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide my-2 rounded-1 shadowBlack" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/1.jpg" alt="First slide" style="max-height:250px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/2.jpg" alt="Second slide" style="max-height:250px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/3.jpg" alt="Third slide" style="max-height:250px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>

        <div class="col">
            <div class="row" style="padding:22px;padding-top:0">
                <div class="col">
                    <div class="card shadowBlack">
                        <img class="card-img-top" src="images/acount.jpg" style="max-height:155px;min-height:155px"
                            alt="Card image cap">
                        <div class="card-body">
                            <a href="accounts.php" class="btn btn-outline-success btn-block">Account Summary</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadowBlack">
                        <img class="card-img-top" src="images/transfer.jpg" style="max-height:155px;min-height:155px"
                            alt="Card image cap">
                        <div class="card-body">
                            <a href="transfer.php" class="btn btn-outline-success btn-block">Transfer Money</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding:22px">
                <div class="col">
                    <div class="card shadowBlack">
                        <img class="card-img-top" src="images/bell.gif" style="max-height:155px;min-height:155px"
                            alt="Card image cap">
                        <div class="card-body">
                            <a href="notice.php" class="btn btn-outline-primary btn-block">Check Notification</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadowBlack">
                        <img class="card-img-top" src="images/contacts.gif" style="max-height:155px;min-height:155px"
                            alt="Card image cap">
                        <div class="card-body">
                            <a href="feedback.php" class="btn btn-outline-primary btn-block">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <!-- Contact Us -->
            <div class="footer-column">
                <h5>Contact Us</h5>
                <p><strong>Email:</strong> info@mcb-bank.com</p>
                <p><strong>Phone:</strong> +880 1234 567 890</p>
                <p><strong>Address:</strong> 45/A Green Road, Dhaka, Bangladesh</p>
            </div>

            <!-- Quick Links -->
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

            <!-- Follow Us -->
            <div class="footer-column">
                <h5>Follow Us</h5>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; <?php echo date("Y"); ?> <?php echo BANKNAME; ?>. All Rights Reserved. | Developed by <a
                href="#">Popy Rani Talukder</a>
        </div>
    </footer>

</body>

</html>