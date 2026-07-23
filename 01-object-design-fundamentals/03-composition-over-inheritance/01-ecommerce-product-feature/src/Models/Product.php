<?php
declare(strict_types=1);

namespace App\Models;

use App\Contracts\PricingFeature;
use App\Contracts\InventoryFeature;
use App\Contracts\ReviewFeature;
use App\Contracts\ShippingFeature;
use App\Models\Money;

final class Product
{
	public function __construct(
		public readonly string $name,
		private readonly PricingFeature $pricing,
		private readonly InventoryFeature $inventory,
		private readonly ReviewFeature $review,
		private readonly ShippingFeature $shipping
	) {}

	public function price(): Money
	{
		return $this->pricing->price();
	}

	public function quantity(): int
	{
		return $this->inventory->availableQuantity();
	}

	public function review(): string
	{
		return $this->review->summary();
	}

	public function shippingCost(): Money
	{
		return $this->shipping->shippingCost();
	}
}