<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Product;

final class ProductPresenter
{
	public function show(Product $product): void
	{
		echo <<<TEXT
----------------
PRODUCT DETAILS
----------------
Product : {$product->name}
Price   : {$product->price()->format()}
Shipping: {$product->shippingCost()->format()}
Stock   : {$product->quantity()}
Review  : {$product->review()}

TEXT;
	}
}