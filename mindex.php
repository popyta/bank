<?php
session_start();
if(!isset($_SESSION['managerId'])){ 
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
    <title>Manager Panel - <?php echo bankName; ?></title>

    <?php 
require 'assets/autoloader.php';
require 'assets/db.php';
require 'assets/function.php';
?>

    <?php 
// Delete account if 'delete' is set
if (isset($_GET['delete'])) {
    if ($con->query("DELETE FROM useraccounts WHERE id = '$_GET[delete]'")) {
        header("location:mindex.php");
        exit();
    }
} 
?>

    <style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
        color: white;
        scroll-behavior: smooth;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    /* Navbar */
    .navbar {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6) !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        transition: background 0.5s;
    }

    .navbar:hover {
        background: linear-gradient(90deg, #3b82f6, #1e40af) !important;
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
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
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
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-weight: bold;
        text-align: center;
    }

    /* Table */
    table {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }

    table th,
    table td {
        color: white;
        vertical-align: middle;
        text-align: center;
    }

    table th {
        background: rgba(255, 255, 255, 0.15);
    }

    table tr:hover {
        background: rgba(255, 255, 255, 0.1);
        transition: background 0.3s;
    }

    /* Buttons */
    .btn {
        transition: all 0.3s;
    }

    .btn-success:hover {
        background-color: #16a34a;
    }

    .btn-primary:hover {
        background-color: #2563eb;
    }

    .btn-danger:hover {
        background-color: #dc2626;
    }

    /* Footer */
    footer {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 30px 0;
        margin-top: auto;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.3);
        transition: background 0.5s;
    }

    footer:hover {
        background: linear-gradient(90deg, #3b82f6, #1e40af);
    }

    .footer-column h4 {
        margin-bottom: 15px;
        color: #ffd700;
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

    .footer-bottom {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .footer-bottom a {
        color: #ffd700;
        text-decoration: none;
        transition: text-decoration 0.3s;
    }

    .footer-bottom a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .footer-column {
            text-align: center;
            margin-bottom: 20px;
        }
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <?php echo bankName; ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link active" href="mindex.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="maccounts.php">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="maddnew.php">Add New Account</a></li>
                <li class="nav-item"><a class="nav-link" href="mfeedback.php">Feedback</a></li>
            </ul>
            <?php include 'msideButton.php'; ?>
        </div>
    </nav>

    <br><br><br>

    <!-- Main Content -->
    <div class="container content-wrapper">
        <div class="card w-100 text-center">
            <div class="card-header">All Accounts</div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Holder Name</th>
                            <th>Account No.</th>
                            <th>Branch Name</th>
                            <th>Current Balance</th>
                            <th>Account Type</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i = 0;
                    $array = $con->query("SELECT * FROM useraccounts, branch WHERE useraccounts.branch = branch.branchId");
                    if ($array->num_rows > 0) {
                        while ($row = $array->fetch_assoc()) {
                            $i++;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['accountNo'] ?></td>
                            <td><?php echo $row['branchName'] ?></td>
                            <td>Rs. <?php echo $row['balance'] ?></td>
                            <td><?php echo $row['accountType'] ?></td>
                            <td><?php echo $row['number'] ?></td>
                            <td>
                                <a href="show.php?id=<?php echo $row['id'] ?>" class='btn btn-success btn-sm'>View</a>
                                <a href="mnotice.php?id=<?php echo $row['id'] ?>" class='btn btn-primary btn-sm'>Send
                                    Notice</a>
                                <a href="mindex.php?delete=<?php echo $row['id'] ?>"
                                    class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                <?php echo bankName; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container d-flex justify-content-between flex-wrap">
            <div class="footer-column mb-4">
                <h4>Contact Us</h4>
                <p><strong>Email:</strong> info@mcb-bank.com</p>
                <p><strong>Phone:</strong> +880 1234 567 890</p>
                <p><strong>Address:</strong> 45/A Green Road, Dhaka, Bangladesh</p>
            </div>

            <div class="footer-column mb-4">
                <h4>Quick Links</h4>
                <ul class="list-unstyled" style="line-height:1.8;">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column mb-4">
                <h4>Follow Us</h4>
                <a href="https://facebook.com" target="_blank" style="margin-right:10px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" width="35">
                </a>
                <a href="https://twitter.com" target="_blank" style="margin-right:10px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" width="35">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" width="35">
                </a>
            </div>
        </div>

        <div class="footer-bottom text-center">
            &copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. All Rights Reserved. | Developed by
            <a href="#">Popy Rani Talukder</a>
        </div>
    </footer>

</body>

</html>