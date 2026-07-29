<?php
$post_data = file_get_contents('php://input');
$data = json_decode($post_data, true);

if (isset($data['event']) && $data['event'] === 'payment_link.paid') {
    $payment_entity = $data['payload']['payment_link']['entity'];
    
    $customer_email = $payment_entity['customer']['email'] ?? null;
    $customer_name  = $payment_entity['customer']['name'] ?? 'Valued Member';
    $amount_paid    = isset($payment_entity['amount_paid']) ? ($payment_entity['amount_paid'] / 100) : 'N/A';

    if ($customer_email) {
        require_once 'send_mail.php';
        sendTelegramInvite($customer_email, $customer_name, $amount_paid);
    }
    
    http_response_code(200);
    echo "SUCCESS";
} else {
    http_response_code(400);
    echo "INVALID_EVENT";
}
?>
