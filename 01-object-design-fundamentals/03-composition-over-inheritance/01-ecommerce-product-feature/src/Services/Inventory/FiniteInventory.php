<?php
declare(strict_types=1);

namespace App\Services\Inventory;

use App\Contracts\InventoryFeature;

final class FiniteInventory implements InventoryFeature
{
	public function __construct(private readonly int $quantity)	{}

	public function availableQuantity(): int
	{
		return $this->quantity;
	}
}