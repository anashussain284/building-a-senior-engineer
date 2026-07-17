<?php
declare(strict_types=1);

namespace App\Models;

final readonly class PaymentResult
{
	public function __construct(
		public bool $successful,
		public string $transactionId,
		public string $message
	) { }
}