<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $plan  = trim($_POST['plan']);

    // Exact Razorpay Links mapped to plans
    $payment_links = [
        "3500"  => "https://rzp.io/rzp/7fvTMz0",
        "5900"  => "https://rzp.io/rzp/gTDKyKYx",
        "7900"  => "https://rzp.io/rzp/mXzHhVTS",
        "19900" => "https://rzp.io/rzp/ZtFoBzi"
    ];

    if (!array_key_exists($plan, $payment_links)) {
        die("Invalid plan selected.");
    }

    $base_link = $payment_links[$plan];

    // Pre-fill parameters on Razorpay Page
    $redirect_url = $base_link . "?email=" . urlencode($email) . "&phone=" . urlencode($phone) . "&name=" . urlencode($name);

    header("Location: " . $redirect_url);
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>
