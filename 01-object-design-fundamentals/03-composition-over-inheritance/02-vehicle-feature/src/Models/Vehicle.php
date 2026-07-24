<?php
declare(strict_types=1);

namespace App\Models;

use App\Contracts\EngineFeature;
use App\Contracts\FuelFeature;

final class Vehicle
{
	public function __construct(
		public readonly string $name,
		private readonly EngineFeature $engine,
		private readonly FuelFeature $fule
	) {}

	public function engine(): string
	{
		return $this->engine->engineSpecification();
	}

	public function fuel(): string
	{
		return $this->fule->fuelType();
	}
}