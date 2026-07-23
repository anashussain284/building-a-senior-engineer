<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Money;

interface ShippingFeature
{
	public function shippingCost(): Money;
}