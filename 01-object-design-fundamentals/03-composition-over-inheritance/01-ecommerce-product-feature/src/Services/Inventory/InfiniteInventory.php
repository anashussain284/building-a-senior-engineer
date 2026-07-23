<?php
declare(strict_types=1);

namespace App\Services\Inventory;

use App\Contracts\InventoryFeature;

final class InfiniteInventory implements InventoryFeature
{
	public function availableQuantity(): int
	{
		return PHP_INT_MAX;
	}
}