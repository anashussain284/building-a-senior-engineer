<?php
declare(strict_types=1);

namespace App\Contracts;

interface EngineFeature
{
	public function engineSpecification(): string;
}