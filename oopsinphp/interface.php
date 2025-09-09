<?php
// Interface (contract)
interface PaymentGateway {
    public function pay($amount);
}

// Class 1 implementing interface
class PayPal implements PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount using PayPal<br>";
    }
}

// Class 2 implementing interface
class Stripe implements PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount using Stripe<br>";
    }
}

// Function that uses the interface
function processPayment(PaymentGateway $gateway, $amount) {
    $gateway->pay($amount);
}

// Test
processPayment(new PayPal(), 100);
processPayment(new Stripe(), 200);
?>
