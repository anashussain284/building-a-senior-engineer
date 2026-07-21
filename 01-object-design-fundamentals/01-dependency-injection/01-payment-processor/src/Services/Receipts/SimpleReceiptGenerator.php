<?php
declare(strict_types=1);

namespace App\Services\Receipts;

use App\Contracts\ReceiptGenerator;
use App\Contracts\AuditLogger;
use App\Contracts\CurrencyFormatter;
use App\Contracts\TransactionReferenceGenerator;
use App\Models\Payment;
use App\Models\PaymentResult;

final class SimpleReceiptGenerator implements ReceiptGenerator
{
	public function __construct(
		private CurrencyFormatter $currencyFormatter,
		private TransactionReferenceGenerator $referenceGenerator,
		private AuditLogger $auditLogger
	) { }

	public function generate(Payment $payment, PaymentResult $result): string
	{
		$formattedAmount = $this->currencyFormatter->format($payment->amountInPaise, $payment->currency);

		$reference = $this->referenceGenerator->generate($result->transactionId);

		$this->auditLogger->log('receipt_generated', [
			'customer' => $payment->customerName,
			'reference' => $reference,
			'transaction_id' => $result->transactionId,
			'formattedAmount' => $formattedAmount
		]);

        return <<<TEXT
--------------------------------
PAYMENT RECEIPT
--------------------------------
Customer : {$payment->customerName}
Amount   : {$formattedAmount}
Currency : {$payment->currency}
Txn ID   : {$result->transactionId}
Status   : {$result->message}
--------------------------------
TEXT;
	}
}