<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Logger;
use App\Contracts\PaymentGateway;
use App\Contracts\ReceiptGenerator;
use App\Contracts\Notifier;
use App\Models\Payment;
use App\Models\PaymentResult;

final readonly class PaymentProcessor
{
	public function __construct(
		private PaymentGateway $gateway,
		private Logger $logger,
		private ReceiptGenerator $receiptGenerator,
		private Notifier $notifier
	) { }

	public function process(Payment $payment): PaymentResult
	{
		$this->logger->info("Processing payment for {$payment->customerName}");

		$result = $this->gateway->charge($payment);

		if (!$result->isSuccessful) {
			$this->logger->info("Payment failed for transaction: {$result->transactionId}");
			$this->notifier->send("Payment failed: {$result->message}");
			return $result;
		}

		$receipt = $this->receiptGenerator->generate($payment, $result);

		$this->notifier->send("Payment successful. Receipt Details:\n{$receipt}");
		$this->logger->info("Transaction completed: {$result->transactionId}");

		return $result;
	}
}