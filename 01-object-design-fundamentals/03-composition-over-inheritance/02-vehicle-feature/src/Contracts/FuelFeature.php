<?php
declare(strict_types=1);

namespace App\Contracts;

interface FuelFeature
{
	public function fuelType(): string;
}