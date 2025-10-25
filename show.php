<?php
session_start();
if(!isset($_SESSION['managerId'])){
    header('location:login.php');
    exit();
}

// ✅ Bank name define
if (!defined('bankname')) {
    define('bankname', 'MCB Bank'); // এখানে তোমার ব্যাংকের নাম লিখো
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Banking</title>
    <?php require 'assets/autoloader.php'; ?>
    <?php require 'assets/db.php'; ?>
    <?php require 'assets/function.php'; ?>

    <?php 
  // Delete account if 'delete' is set
  if (isset($_GET['delete']) && !empty($_GET['delete'])) {
      $con->query("DELETE FROM useraccounts WHERE id ='$_GET[delete]'");
      header("location:mindex.php");
      exit();
  }
  ?>
</head>

<body style="background:#96D678;background-size: 100%">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <?php echo bankname; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

    <?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger text-center'>No account selected.</div>";
    exit();
}

$array = $con->query("SELECT * FROM useraccounts,branch WHERE useraccounts.id = '$_GET[id]' AND useraccounts.branch = branch.branchId");
if ($array->num_rows == 0) {
    echo "<div class='alert alert-danger text-center'>Account not found.</div>";
    exit();
}

$row = $array->fetch_assoc();
?>

    <div class="container">
        <div class="card w-100 text-center shadowBlue">
            <div class="card-header">
                Account profile for <?php echo $row['name']; ?> <kbd>#<?php echo $row['accountNo']; ?></kbd>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <th><?php echo $row['name']; ?></th>
                            <td>Account No</td>
                            <th><?php echo $row['accountNo']; ?></th>
                        </tr>
                        <tr>
                            <td>Branch Name</td>
                            <th><?php echo $row['branchName']; ?></th>
                            <td>Branch Code</td>
                            <th><?php echo $row['branchNo']; ?></th>
                        </tr>
                        <tr>
                            <td>Current Balance</td>
                            <th><?php echo $row['balance']; ?></th>
                            <td>Account Type</td>
                            <th><?php echo $row['accountType']; ?></th>
                        </tr>
                        <tr>
                            <td>CNIC</td>
                            <th><?php echo $row['cnic']; ?></th>
                            <td>City</td>
                            <th><?php echo $row['city']; ?></th>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <th><?php echo $row['number']; ?></th>
                            <td>Address</td>
                            <th><?php echo $row['address']; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                <?php echo bankname; ?>
            </div>
        </div>
    </div>
</body>

</html>