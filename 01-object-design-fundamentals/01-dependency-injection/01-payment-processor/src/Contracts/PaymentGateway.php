<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Payment;
use App\Models\PaymentResult;

interface PaymentGateway
{
	public function charge(Payment $payment): PaymentResult;
}