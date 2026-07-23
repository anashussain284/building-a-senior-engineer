<?php
declare(strict_types=1);

namespace App\Services\Shipping;

use App\Contracts\ShippingFeature;
use App\Models\Money;

final class PaidShipping implements ShippingFeature
{
	public function __construct(private readonly int $amount) {}

	public function shippingCost(): Money
	{
		return new Money(
			amountInCent: $this->amount,
			currency: 'USD'
		);
	}
}