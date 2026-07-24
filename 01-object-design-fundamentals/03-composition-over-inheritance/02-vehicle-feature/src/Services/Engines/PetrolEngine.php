<?php
declare(strict_types=1);

namespace App\Services\Engines;

use App\Contracts\EngineFeature;

final class PetrolEngine implements EngineFeature
{
	public function engineSpecification(): string
	{
		return '2.0L Petrol Engine';
	}
}