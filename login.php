<?php
session_start();

// Fixed credentials
$valid_user = "it@cctn";
$valid_pass = "fP\$tirnd"; // Note: may backslash bago ang $ para sure

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $valid_user && $_POST['password'] === $valid_pass) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Invalid login!'); window.location.href='login.html';</script>";
    }
} else {
    header("Location: login.html");
    exit;
}
?>
