<?php 
// Database connection
$con = new mysqli('localhost', 'root', '', 'mybank');

// Check connection
if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}

// Define constant (case-sensitive in PHP 8+)
define('BANKNAME', 'MCB Bank');

// Fetch logged-in user data
if (isset($_SESSION['userId'])) {
    $ar = $con->query("SELECT * FROM userAccounts, branch WHERE id = '{$_SESSION['userId']}' AND userAccounts.branch = branch.branchId");
    $userData = $ar->fetch_assoc();
}
?>
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>