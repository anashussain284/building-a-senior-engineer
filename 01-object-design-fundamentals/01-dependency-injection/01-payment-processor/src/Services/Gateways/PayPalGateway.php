<?php
declare(strict_types=1);

namespace App\Services\Gateways;

use App\Contracts\PaymentGateway;
use App\Models\Payment;
use App\Models\PaymentResult;

final class PayPalGateway  implements PaymentGateway
{
	public function charge(Payment $payment): PaymentResult
	{
		return new PaymentResult(
			isSuccessful: true,
			transactionId: uniqid('paypal_', true),
			message: 'Payment processed via Paypal'
		);
	}
}