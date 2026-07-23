<?php
declare(strict_types=1);

namespace App\Services\Inventory;

use App\Contracts\InventoryFeature;

final class OutOfStockInventory implements InventoryFeature
{
	public function availableQuantity(): int
	{
		return 0;
	}
}