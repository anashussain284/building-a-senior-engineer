<?php
declare(strict_types=1);

namespace App\Contracts;

interface SafetyFeature
{
	public function airbag(): string;
}