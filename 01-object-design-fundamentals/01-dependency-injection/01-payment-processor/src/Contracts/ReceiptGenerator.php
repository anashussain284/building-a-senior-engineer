<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Payment;
use App\Models\PaymentResult;

interface ReceiptGenerator
{
	public function generate(Payment $payment, PaymentResult $result): string;
}