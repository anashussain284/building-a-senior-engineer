<?php
declare(strict_types=1);

namespace App\Services\Gateways;

use App\Contracts\PaymentGateway;
use App\Models\Payment;
use App\Models\PaymentResult;

class RazorpayGateway implements PaymentGateway
{
	public function charge(Payment $payment): PaymentResult
	{
		return new PaymentResult(
			successful: true,
			transactionId: uniqid('razorpay_', true),
			message: "Payment processed via Razorpay."
		);
	}
}