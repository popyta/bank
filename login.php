<!DOCTYPE html>
<html>

<head>
    <title>Banking</title>
    <?php require 'assets/autoloader.php'; ?>
    <?php require 'assets/function.php'; ?>
    <?php
    // Database connection
    $con = new mysqli('localhost', 'root', '', 'mybank');

    // Define constant (case-sensitive in PHP 8+)
    define('BANKNAME', 'MCB Bank');

    $error = "";

    if (isset($_POST['userLogin'])) {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $result = $con->query("SELECT * FROM userAccounts WHERE email='$user' AND password='$pass'");
        if ($result->num_rows > 0) {
            session_start();
            $data = $result->fetch_assoc();
            $_SESSION['userId'] = $data['id'];
            $_SESSION['user'] = $data;
            header('location:index.php');
        } else {
            $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong, try again!</div>";
        }
    }

    if (isset($_POST['cashierLogin'])) {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $result = $con->query("SELECT * FROM login WHERE email='$user' AND password='$pass'");
        if ($result->num_rows > 0) {
            session_start();
            $data = $result->fetch_assoc();
            $_SESSION['cashId'] = $data['id'];
            header('location:cindex.php');
        } else {
            $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong, try again!</div>";
        }
    }

    if (isset($_POST['managerLogin'])) {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $result = $con->query("SELECT * FROM login WHERE email='$user' AND password='$pass' AND type='manager'");
        if ($result->num_rows > 0) {
            session_start();
            $data = $result->fetch_assoc();
            $_SESSION['managerId'] = $data['id'];
            header('location:mindex.php');
        } else {
            $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong, try again!</div>";
        }
    }
    ?>
</head>

<body style="background: url(images/bg-login2.jpg); background-size: 100%;">
    <h1 class="alert alert-success rounded-0">
        <?php echo BANKNAME; ?>
        <small class="float-right text-muted" style="font-size: 12pt;">
            <kbd>Presented by: popy Rani</kbd>
        </small>
    </h1>
    <br>
    <?php echo $error; ?>
    <br>

    <div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
        <br>
        <h4 class="text-center text-white">Select Your Session</h4>

        <!-- User Login -->
        <div class="card rounded-0">
            <div class="card-header" role="tab" id="headingOne">
                <h5 class="mb-0">
                    <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        <button class="btn btn-outline-success btn-block">User Login</button>
                    </a>
                </h5>
            </div>
            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                data-parent="#accordion">
                <div class="card-body">
                    <form method="POST">
                        <input type="email" name="email" class="form-control" required placeholder="Enter Email"
                            value="some@gmail.com">
                        <input type="password" name="password" class="form-control" required
                            placeholder="Enter Password" value="some">
                        <button type="submit" class="btn btn-primary btn-block btn-sm my-1"
                            name="userLogin">Enter</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Manager Login -->
        <div class="card rounded-0">
            <div class="card-header" role="tab" id="headingTwo">
                <h5 class="mb-0">
                    <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Manager Login
                    </a>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                data-parent="#accordion">
                <div class="card-body">
                    <form method="POST">
                        <input type="email" name="email" class="form-control" required placeholder="Enter Email"
                            value="manager@manager.com">
                        <input type="password" name="password" class="form-control" required
                            placeholder="Enter Password" value="manager">
                        <button type="submit" class="btn btn-primary btn-block btn-sm my-1"
                            name="managerLogin">Enter</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cashier Login -->
        <div class="card rounded-0">
            <div class="card-header" role="tab" id="headingThree">
                <h5 class="mb-0">
                    <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Cashier Login
                    </a>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                data-parent="#accordion">
                <div class="card-body">
                    <form method="POST">
                        <input type="email" name="email" class="form-control" required placeholder="Enter Email"
                            value="cashier@cashier.com">
                        <input type="password" name="password" class="form-control" required
                            placeholder="Enter Password" value="cashier">
                        <button type="submit" class="btn btn-primary btn-block btn-sm my-1"
                            name="cashierLogin">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>