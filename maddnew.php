<?php
session_start();
if(!isset($_SESSION['managerId'])){
    header('location:login.php');
    exit();
}

// ✅ Bank name define
if (!defined('bankname')) {
    define('bankname', 'MCB Bank');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <?php require 'assets/autoloader.php'; ?>
    <?php require 'assets/db.php'; ?>
    <?php require 'assets/function.php'; ?>

    <style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%);
        overflow-x: hidden;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    /* Floating shapes */
    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        animation: float 15s ease-in-out infinite;
        z-index: 0;
        background-color: white;
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
            transform: translateY(-30px) translateX(30px) rotate(45deg);
        }
    }

    /* Navbar gradient */
    .navbar {
        z-index: 10;
        background: linear-gradient(90deg, #1e40af, #3b82f6) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
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
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .card-header,
    .card-footer {
        background: linear-gradient(90deg, #1e40af, #3b82f6);
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

    /* Footer gradient */
    footer {
        background: linear-gradient(90deg, #1e40af, #3b82f6);
        color: white;
        padding: 30px 0;
        z-index: 10;
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

    <!-- Floating shapes -->
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>

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
                <li class="nav-item active"><a class="nav-link" href="maddnew.php">Add New Account</a></li>
                <li class="nav-item"><a class="nav-link" href="mfeedback.php">Feedback</a></li>
            </ul>
            <?php include 'msideButton.php'; ?>
        </div>
    </nav>

    <br><br><br>

    <div class="content-wrapper container">
        <?php
        // Save new account
        if (isset($_POST['saveAccount'])) {
            $insert = $con->query("INSERT INTO useraccounts 
                (name, cnic, accountNo, accountType, city, address, email, password, balance, source, number, branch) 
                VALUES 
                ('$_POST[name]','$_POST[cnic]','$_POST[accountNo]','$_POST[accountType]','$_POST[city]',
                '$_POST[address]','$_POST[email]','$_POST[password]','$_POST[balance]','$_POST[source]','$_POST[number]','$_POST[branch]')");

            if (!$insert) {
                echo "<div class='alert alert-danger'>Failed. Error: ".$con->error."</div>";
            } else {
                echo "<div class='alert alert-success text-center'>Account added Successfully</div>";
            }
        }
        ?>

        <div class="card w-100 text-center shadowBlue">
            <div class="card-header">New Account Form</div>
            <div class="card-body bg-dark text-white">
                <form method="POST">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" class="form-control input-sm" required></td>
                                <th>CNIC</th>
                                <td><input type="number" name="cnic" class="form-control input-sm" required></td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td><input type="text" name="accountNo" readonly value="<?php echo time(); ?>"
                                        class="form-control input-sm" required></td>
                                <th>Account Type</th>
                                <td>
                                    <select class="form-control input-sm" name="accountType" required>
                                        <option value="current">Current</option>
                                        <option value="saving">Saving</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><input type="text" name="city" class="form-control input-sm" required></td>
                                <th>Address</th>
                                <td><input type="text" name="address" class="form-control input-sm" required></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="email" name="email" class="form-control input-sm" required></td>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control input-sm" required></td>
                            </tr>
                            <tr>
                                <th>Deposit</th>
                                <td><input type="number" name="balance" min="500" class="form-control input-sm"
                                        required></td>
                                <th>Source of Income</th>
                                <td><input type="text" name="source" class="form-control input-sm" required></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td><input type="number" name="number" class="form-control input-sm" required></td>
                                <th>Branch</th>
                                <td>
                                    <select name="branch" required class="form-control input-sm">
                                        <option selected value="">Please Select..</option>
                                        <?php 
                                        $arr = $con->query("SELECT * FROM branch");
                                        if ($arr->num_rows > 0) {
                                            while ($row = $arr->fetch_assoc()) {
                                                echo "<option value='{$row['branchId']}'>{$row['branchName']}</option>";
                                            }
                                        } else {
                                            echo "<option value='1'>Main Branch</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="submit" name="saveAccount" class="btn btn-primary btn-sm">Save
                                        Account</button>
                                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="card-footer text-muted">
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