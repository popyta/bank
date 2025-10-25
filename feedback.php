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
<html>

<head>
    <title>Banking</title>
    <?php
    require 'assets/autoloader.php';
    require 'assets/db.php';
    require 'assets/function.php';
    ?>
    <style>
    /* Animated gradient background */
    body {
        background: linear-gradient(270deg, #4ade80, #3b82f6, #facc15, #f472b6);
        background-size: 800% 800%;
        animation: gradientBG 20s ease infinite;
        font-family: sans-serif;
        min-height: 100vh;
        margin: 0;
        padding-bottom: 150px;
        /* For footer spacing */
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    footer {
        background: rgba(0, 0, 0, 0.85);
        color: #fff;
        padding: 40px 0;
        text-align: center;
        position: fixed;
        width: 100%;
        bottom: 0;
    }

    footer a {
        color: #4ade80;
        text-decoration: underline;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
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
                <li class="nav-item"><a class="nav-link" href="accounts.php">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="statements.php">Account Statements</a></li>
                <li class="nav-item"><a class="nav-link" href="transfer.php">Funds Transfer</a></li>
            </ul>
            <?php include 'sideButton.php'; ?>
        </div>
    </nav>

    <br><br><br>

    <div class="container">
        <div class="card w-75 mx-auto">
            <div class="card-header text-center">
                Help Card
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="alert alert-success w-50 mx-auto">
                        <h5>Enter your message</h5>
                        <textarea class="form-control" name="msg" required placeholder="Write your message"></textarea>
                        <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
                    </div>
                </form>

                <br>

                <?php
                if (isset($_POST['send'])) {
                    $msg = $con->real_escape_string($_POST['msg']); // safer
                    if ($con->query("INSERT INTO feedback (message, userId) VALUES ('$msg', '$_SESSION[userId]')")) {
                        echo "<div class='alert alert-success'>Successfully sent</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Not sent. Error: ".$con->error."</div>";
                    }
                }
                ?>
            </div>
            <div class="card-footer text-muted text-center">
                <?php echo bankName; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div>
            &copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. All Rights Reserved. | Developed by
            <a href="#">Popy Rani Talukder</a>
        </div>
        <div style="margin-top:10px;">
            Email: info@mcb-bank.com | Phone: +880 1234 567 890 | Address: 45/A Green Road, Dhaka
        </div>
    </footer>
</body>

</html>