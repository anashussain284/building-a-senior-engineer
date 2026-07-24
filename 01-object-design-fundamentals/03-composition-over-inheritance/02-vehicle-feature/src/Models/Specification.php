<?php
declare(strict_types=1);

namespace App\Models;

final readonly class Specification
{
	public function __construct(
		public string $label,
		public string $value
	) {}
}