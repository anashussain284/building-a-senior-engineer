<?php
declare(strict_types=1);

namespace App\Services\Pricing;

use App\Contracts\PricingFeature;
use App\Models\Money;

final class DiscountPrice implements PricingFeature
{
	public function __construct(
		private readonly int $amount,
		private readonly int $discount
	) {}

	public function price(): Money
	{
		$discountAmount = $this->amount - $this->discount;
		return new Money(
			amountInCent: $discountAmount,
			currency: 'USD'
		);
	}
}