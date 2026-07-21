<?php
declare(strict_types=1);

namespace App\Services\Receipts;

use App\Contracts\ReceiptGenerator;
use App\Models\Payment;
use App\Models\PaymentResult;

final class SimpleReceiptGenerator implements ReceiptGenerator
{
	public function generate(Payment $payment, PaymentResult $result): string
	{
        return <<<TEXT
--------------------------------
PAYMENT RECEIPT
--------------------------------
Customer : {$payment->customerName}
Amount   : {$payment->amountInPaise}
Currency : {$payment->currency}
Txn ID   : {$result->transactionId}
Status   : {$result->message}
--------------------------------
TEXT;
	}
}