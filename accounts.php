<?php
session_start();
if(isset($_SESSION['userId'])){
    header('location:index.php');
}
$con = new mysqli('localhost','root','','mybank');
define('BANKNAME','MCB Bank');
$error = "";

if(isset($_POST['userLogin'])){
    $user=$_POST['email'];
    $pass=$_POST['password'];
    $res=$con->query("SELECT * FROM userAccounts WHERE email='$user' AND password='$pass'");
    if($res->num_rows>0){
        session_start();
        $data=$res->fetch_assoc();
        $_SESSION['userId']=$data['id'];
        $_SESSION['user']=$data;
        header('location:index.php');
    }else{
        $error="<div class='alert alert-warning text-center rounded-0'>Username or password wrong!</div>";
    }
}

// Manager Login
if(isset($_POST['managerLogin'])){
    $user=$_POST['email'];
    $pass=$_POST['password'];
    $res=$con->query("SELECT * FROM login WHERE email='$user' AND password='$pass' AND type='manager'");
    if($res->num_rows>0){
        session_start();
        $data=$res->fetch_assoc();
        $_SESSION['managerId']=$data['id'];
        header('location:mindex.php');
    }else{
        $error="<div class='alert alert-warning text-center rounded-0'>Username or password wrong!</div>";
    }
}

// Cashier Login
if(isset($_POST['cashierLogin'])){
    $user=$_POST['email'];
    $pass=$_POST['password'];
    $res=$con->query("SELECT * FROM login WHERE email='$user' AND password='$pass'");
    if($res->num_rows>0){
        session_start();
        $data=$res->fetch_assoc();
        $_SESSION['cashId']=$data['id'];
        header('location:cindex.php');
    }else{
        $error="<div class='alert alert-warning text-center rounded-0'>Username or password wrong!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo BANKNAME;?> - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    /* FULL SCREEN GRADIENT */
    body,
    html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%) !important;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow: hidden;
        position: relative;
    }

    /* FLOATING SHAPES */
    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.25;
        animation: float 7s ease-in-out infinite;
        z-index: 0;
    }

    .shape1 {
        width: 200px;
        height: 200px;
        background: #ffd700;
        top: -50px;
        left: -50px;
    }

    .shape2 {
        width: 250px;
        height: 250px;
        background: #ff6b6b;
        bottom: -80px;
        right: -80px;
        animation-delay: 2s;
    }

    .shape3 {
        width: 180px;
        height: 180px;
        background: #0dcaf0;
        top: 120px;
        right: -60px;
        animation-delay: 4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) translateX(0) rotate(0deg);
        }

        50% {
            transform: translateY(-25px) translateX(25px) rotate(45deg);
        }
    }

    /* LOGIN CARD STYLING */
    #accordion {
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.3);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        width: 360px;
        z-index: 10;
        position: relative;
    }

    /* HEADER */
    h1.alert {
        background: linear-gradient(to right, #fcd34d, #fbbf24);
        color: #1e3a8a;
        text-align: center;
        font-size: 2rem;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
    }

    /* INPUT & BUTTON */
    input.form-control,
    button.btn {
        border-radius: 10px;
    }

    .card-header button {
        font-weight: bold;
        border-radius: 12px;
        transition: 0.3s;
    }

    .card-header button:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>

    <div>
        <h1 class="alert"><?php echo BANKNAME;?>
            <small class="float-right text-muted" style="font-size:12pt;"><kbd>Presented by: Popy Rani</kbd></small>
        </h1>
        <?php echo $error; ?>

        <div id="accordion" role="tablist">
            <h4 class="text-center text-white mb-3">Select Your Session</h4>

            <!-- User Login -->
            <div class="card rounded-0 mb-2">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                            style="text-decoration:none;">
                            <button class="btn btn-outline-primary btn-block">User Login</button>
                        </a>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                    data-parent="#accordion">
                    <div class="card-body">
                        <form method="POST">
                            <input type="email" name="email" class="form-control my-2" required
                                placeholder="Enter Email" value="some@gmail.com">
                            <input type="password" name="password" class="form-control my-2" required
                                placeholder="Enter Password" value="some">
                            <button type="submit" class="btn btn-primary btn-block my-1" name="userLogin">Enter</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Manager Login -->
            <div class="card rounded-0 mb-2">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed btn btn-outline-primary btn-block" data-toggle="collapse"
                            href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Manager Login
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                    data-parent="#accordion">
                    <div class="card-body">
                        <form method="POST">
                            <input type="email" name="email" class="form-control my-2" required
                                placeholder="Enter Email" value="manager@manager.com">
                            <input type="password" name="password" class="form-control my-2" required
                                placeholder="Enter Password" value="manager">
                            <button type="submit" class="btn btn-primary btn-block my-1"
                                name="managerLogin">Enter</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cashier Login -->
            <div class="card rounded-0">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <a class="collapsed btn btn-outline-primary btn-block" data-toggle="collapse"
                            href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Cashier Login
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                    data-parent="#accordion">
                    <div class="card-body">
                        <form method="POST">
                            <input type="email" name="email" class="form-control my-2" required
                                placeholder="Enter Email" value="cashier@cashier.com">
                            <input type="password" name="password" class="form-control my-2" required
                                placeholder="Enter Password" value="cashier">
                            <button type="submit" class="btn btn-primary btn-block my-1"
                                name="cashierLogin">Enter</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>