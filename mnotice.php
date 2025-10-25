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

$array = $con->query("SELECT * FROM useraccounts WHERE id = '$_GET[id]'");
if ($array->num_rows == 0) {
    echo "<div class='alert alert-danger text-center'>Account not found.</div>";
    exit();
}

$row = $array->fetch_assoc();
?>

    <div class="container">
        <div class="card w-100 text-center shadowBlue">
            <div class="card-header">
                Send Notice to <?php echo $row['name'] ?>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="alert alert-success w-50 mx-auto">
                        <h5>Write notice for <?php echo $row['name'] ?></h5>
                        <input type="hidden" name="userId" value="<?php echo $row['id'] ?>">
                        <textarea class="form-control" name="notice" required
                            placeholder="Write your message"></textarea>
                        <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
                    </div>
                </form>
                <?php
    if (isset($_POST['send']))
    {
        $notice = $con->real_escape_string($_POST['notice']);
        $userId = intval($_POST['userId']);
        if ($con->query("INSERT INTO notice (notice,userId) VALUES ('$notice','$userId')")) {
            echo "<div class='alert alert-success text-center'>Successfully sent</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Not sent. Error: ".$con->error."</div>";
        }
    }
    ?>
            </div>
            <div class="card-footer text-muted">
                <?php echo bankname; ?>
            </div>
        </div>
    </div>
</body>

</html>