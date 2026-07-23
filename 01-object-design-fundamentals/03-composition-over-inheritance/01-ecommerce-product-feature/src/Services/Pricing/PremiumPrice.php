<?php
declare(strict_types=1);

namespace App\Services\Pricing;

use App\Contracts\PricingFeature;
use App\Models\Money;

final class PremiumPrice implements PricingFeature
{
	public function __construct(private readonly int $amount) {}

	public function price(): Money
	{
		return new Money(
			amountInCent: $this->amount,
			currency: 'USD'
		);
	}
}