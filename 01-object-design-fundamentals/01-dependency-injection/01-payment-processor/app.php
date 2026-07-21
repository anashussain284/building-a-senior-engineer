<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Payment;
use App\Services\Gateways\RazorpayGateway;
use App\Services\Gateways\PayPalGateway;
use App\Services\Gateways\StripeGateway;
use App\Services\Notifications\EmailNotifier;
use App\Services\Notifications\SmsNotifier;
use App\Services\Logging\ConsoleLogger;
use App\Services\Receipts\SimpleReceiptGenerator;
use App\Services\PaymentProcessor;
use App\Services\Notifications\SlackNotifier;

$payment1 = new Payment(
	customerName: "Anas Hussain",
	amountInPaise: 1000,
	currency: "INR"
);

$razorpayGateway = new RazorpayGateway();
$payPalGateway = new PayPalGateway();
$stripeGateway = new StripeGateway();
$consoleLogger = new ConsoleLogger();
$simpleReceiptGenerator = new SimpleReceiptGenerator();
$emailNotifier = new EmailNotifier();
$smsNotifier = new SmsNotifier();
$slackNotifier = new SlackNotifier();

$paymentProcessor = new PaymentProcessor(
	gateway: $stripeGateway,
	logger: $consoleLogger,
	receiptGenerator: $simpleReceiptGenerator,
	notifier: $slackNotifier
);

$paymentProcessor->process($payment1);