<?php
declare(strict_types=1);

namespace App\Services\Receipts;

use App\Contracts\ReceiptGenerator;
use App\Models\Payment;
use App\Models\PaymentResult;

final class class SimpleReceiptGenerator implements ReceiptGenerator
{
	public function generate(Payment $payment, PaymentResult $result): string
	{

	}
}