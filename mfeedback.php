<?php
session_start();
if(!isset($_SESSION['managerId'])){
    header('location:login.php');
    exit();
}

// ✅ Bank name constant define
if (!defined('bankname')) {
    define('bankname', 'MCB Bank');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - <?php echo bankname; ?></title>
    <?php require 'assets/autoloader.php'; ?>
    <?php require 'assets/db.php'; ?>
    <?php require 'assets/function.php'; ?>

    <?php 
      // Delete feedback message
      if (isset($_GET['delete'])) {
        if ($con->query("DELETE FROM feedback WHERE feedbackId = '$_GET[delete]'")) {
          header("location:mfeedback.php");
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
        background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%);
        color: white;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    /* Navbar gradient */
    .navbar {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        z-index: 10;
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
        color: white !important;
    }

    .navbar .nav-item.active .nav-link {
        font-weight: bold;
        color: #ffd700 !important;
    }

    /* Content Card */
    .content-wrapper {
        flex: 1;
        padding: 20px 0;
    }

    .card {
        background: rgba(0, 0, 0, 0.7);
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
    }

    .card-header,
    .card-footer {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        color: #ffd700;
        font-weight: bold;
        text-align: center;
    }

    table.table {
        background: rgba(31, 41, 55, 0.8);
        color: white;
        border-radius: 8px;
        overflow: hidden;
    }

    table th,
    table td {
        vertical-align: middle !important;
    }

    .btn-danger {
        background: #dc2626;
        border: none;
    }

    .btn-danger:hover {
        background: #b91c1c;
    }

    /* Footer gradient */
    footer {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 30px 0;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.3);
    }

    .footer-column h4 {
        color: #ffd700;
        margin-bottom: 15px;
    }

    .footer-column ul li a {
        color: white;
        text-decoration: none;
    }

    .footer-column ul li a:hover {
        color: #ffd700;
        text-decoration: underline;
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" alt="">
            <?php echo bankname; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="mindex.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="maccounts.php">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="maddnew.php">Add New Account</a></li>
                <li class="nav-item active"><a class="nav-link" href="mfeedback.php">Feedback</a></li>
            </ul>
            <?php include 'msideButton.php'; ?>
        </div>
    </nav>

    <br><br><br>

    <!-- Main Content -->
    <div class="content-wrapper container">
        <div class="card w-100 text-center">
            <div class="card-header">
                Feedback from Account Holder
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Account No.</th>
                            <th>Contact</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $array = $con->query("SELECT * FROM useraccounts, feedback WHERE useraccounts.id = feedback.userId");
                        if ($array->num_rows > 0) {
                            while ($row = $array->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['accountNo']); ?></td>
                            <td><?php echo htmlspecialchars($row['number']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td>
                                <a href="mfeedback.php?delete=<?php echo $row['feedbackId']; ?>"
                                    class='btn btn-danger btn-sm' title="Delete this Message">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                          echo "<tr><td colspan='5' class='text-center'>No feedback messages found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?php echo bankname; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container d-flex justify-content-between flex-wrap">
            <!-- Contact Us -->
            <div class="footer-column mb-4">
                <h4>Contact Us</h4>
                <p><strong>Email:</strong> info@mcb-bank.com</p>
                <p><strong>Phone:</strong> +880 1234 567 890</p>
                <p><strong>Address:</strong> 45/A Green Road, Dhaka, Bangladesh</p>
            </div>

            <!-- Quick Links -->
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

            <!-- Follow Us -->
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
            &copy; <?php echo date("Y"); ?> <?php echo bankname; ?>. All Rights Reserved. | Developed by
            <a href="#">Popy Rani Talukder</a>
        </div>
    </footer>

</body>

</html>