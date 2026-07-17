<?php
declare(strict_types=1);

namespace App\Models;

final readonly class Payment
{
	public function __construct(
		public string $customerName,
		public float $amount,
		public string $currency
	) { }
}