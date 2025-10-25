<?php
session_start();
if(!isset($_SESSION['cashId'])){
    header('location:login.php');
    exit();
}

if (!defined('bankName')) {
    define('bankName', 'MCB Bank');
}

require 'assets/autoloader.php';
require 'assets/db.php';
require 'assets/function.php';

$note = "";

// Withdraw from other accounts
if (isset($_POST['withdrawOther'])) { 
    $accountNo = $_POST['otherNo'];
    $checkNo = $_POST['checkno'];
    $amount = $_POST['amount'];
    if(setOtherBalance($amount,'debit',$accountNo))
        $note = "<div class='alert alert-success text-center'>✅ Transaction Successful</div>";
    else
        $note = "<div class='alert alert-danger text-center'>❌ Transaction Failed</div>";
}

// Withdraw from user account
if (isset($_POST['withdraw'])) {
    setBalance($_POST['amount'],'debit',$_POST['accountNo']);
    makeTransactionCashier('withdraw',$_POST['amount'],$_POST['checkno'],$_POST['userId']);
    $note = "<div class='alert alert-success text-center'>✅ Transaction Successful</div>";
}

// Deposit to user account
if (isset($_POST['deposit'])) {
    setBalance($_POST['amount'],'credit',$_POST['accountNo']);
    makeTransactionCashier('deposit',$_POST['amount'],$_POST['checkno'],$_POST['userId']);
    $note = "<div class='alert alert-success text-center'>✅ Transaction Successful</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bankName; ?> - Cashier Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
    body {
        background: linear-gradient(120deg, #96D678, #4ade80, #3b82f6);
        background-size: 400% 400%;
        animation: gradientBG 20s ease infinite;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
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

    main {
        flex: 1;
        padding: 80px 20px 20px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    footer {
        background: #343a40;
        color: #fff;
        padding: 40px 0;
        font-size: 15px;
    }

    .btn-custom {
        background: linear-gradient(to right, #4ade80, #3b82f6);
        color: #fff;
    }

    .btn-custom:hover {
        background: linear-gradient(to right, #3b82f6, #4ade80);
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <?php echo bankName; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="cindex.php">Home</a></li>
                </ul>
                <?php include 'csideButton.php'; ?>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="card mx-auto w-100 w-md-75 p-4">
            <h3 class="text-center mb-4">Account Information</h3>
            <?php echo $note; ?>

            <!-- Account Search Form -->
            <form method="POST" class="mb-4">
                <div class="input-group w-75 mx-auto">
                    <input type="text" name="otherNo" class="form-control" placeholder="Enter Account Number" required>
                    <button type="submit" name="get" class="btn btn-custom">Get Info</button>
                </div>
            </form>

            <?php 
        if(isset($_POST['get'])) {
            $other = $con->query("SELECT * FROM otheraccounts WHERE accountNo='{$_POST['otherNo']}'");
            $user = $con->query("SELECT * FROM userAccounts WHERE accountNo='{$_POST['otherNo']}'");

            if($other->num_rows>0){
                $row = $other->fetch_assoc(); ?>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <p><strong>Account No:</strong> <?php echo $row['accountNo']; ?></p>
                        <p><strong>Holder Name:</strong> <?php echo $row['holderName']; ?></p>
                        <p><strong>Bank Name:</strong> <?php echo $row['bankName']; ?></p>
                        <p><strong>Balance:</strong> Rs.<?php echo $row['balance']; ?></p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <form method="POST">
                            <input type="hidden" name="otherNo" value="<?php echo $row['accountNo']; ?>">
                            <input type="number" name="checkno" class="form-control mb-2" placeholder="Check Number"
                                required>
                            <input type="number" name="amount" class="form-control mb-2"
                                max="<?php echo $row['balance']; ?>" placeholder="Amount" required>
                            <button type="submit" name="withdrawOther" class="btn btn-success w-100">Withdraw</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } elseif($user->num_rows>0){
                $row = $user->fetch_assoc(); ?>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <p><strong>Account No:</strong> <?php echo $row['accountNo']; ?></p>
                        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                        <p><strong>Bank:</strong> <?php echo bankName; ?></p>
                        <p><strong>Balance:</strong> Rs.<?php echo $row['balance']; ?></p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <form method="POST" class="mb-2">
                            <input type="hidden" name="accountNo" value="<?php echo $row['accountNo']; ?>">
                            <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                            <input type="number" name="checkno" class="form-control mb-2" placeholder="Check Number"
                                required>
                            <input type="number" name="amount" class="form-control mb-2"
                                max="<?php echo $row['balance']; ?>" placeholder="Withdraw Amount" required>
                            <button type="submit" name="withdraw" class="btn btn-primary w-100">Withdraw</button>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="accountNo" value="<?php echo $row['accountNo']; ?>">
                            <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                            <input type="number" name="checkno" class="form-control mb-2" placeholder="Check Number"
                                required>
                            <input type="number" name="amount" class="form-control mb-2" placeholder="Deposit Amount"
                                required>
                            <button type="submit" name="deposit" class="btn btn-success w-100">Deposit</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else {
                echo "<div class='alert alert-danger text-center'>❌ Account {$_POST['otherNo']} does not exist</div>";
            }
        }
        ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        <div class="container d-flex flex-wrap justify-content-between">
            <div>
                <h5>Contact Us</h5>
                <p>Email: info@mcb-bank.com</p>
                <p>Phone: +880 1234 567 890</p>
                <p>Address: 45/A Green Road, Dhaka, Bangladesh</p>
            </div>
            <div>
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-white text-decoration-none">About</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Services</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Products</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div>
                <h5>Follow Us</h5>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="35"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="35"></a>
                <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" width="35"></a>
            </div>
        </div>
        <div class="text-center mt-3">&copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. Developed by Popy Rani
            Talukder</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>