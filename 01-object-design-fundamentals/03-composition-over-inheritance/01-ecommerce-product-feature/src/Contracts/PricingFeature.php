<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Money;

interface PricingFeature
{
	public function price(): Money;
}