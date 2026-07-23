<?php
declare(strict_types=1);

namespace App\Services\Pricing;

use App\Contracts\PricingFeature;
use App\Models\Money;

final class FixedPrice implements PricingFeature
{
	public function __construct(private readonly Money $price) {}

	public function price(): Money
	{
		return $this->price;
	}
}