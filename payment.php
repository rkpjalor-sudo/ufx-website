<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $plan  = isset($_POST['plan']) ? trim($_POST['plan']) : '';

    // Razorpay Links Mapped with Plans
    $payment_links = [
        "3500"  => "https://rzp.io/rzp/7fvTMz0",
        "5900"  => "https://rzp.io/rzp/gTDKyKYx",
        "7900"  => "https://rzp.io/rzp/mXzHhVTS",
        "19900" => "https://rzp.io/rzp/ZtFoBzi"
    ];

    if (!array_key_exists($plan, $payment_links)) {
        die("Invalid Plan Selected. Please go back and try again.");
    }

    $base_link = $payment_links[$plan];
    $redirect_url = $base_link . "?email=" . urlencode($email) . "&phone=" . urlencode($phone) . "&name=" . urlencode($name);

    // Fallback JavaScript Redirect if header fails
    echo "<!DOCTYPE html><html><head><title>Redirecting...</title></head><body>";
    echo "<p style='color:#fff; font-family:sans-serif; text-align:center; margin-top:50px;'>Redirecting to payment gateway, please wait...</p>";
    echo "<script>window.location.href = " . json_encode($redirect_url) . ";</script>";
    echo "</body></html>";
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>
