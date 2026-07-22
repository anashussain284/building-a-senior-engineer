<?php
declare(strict_types=1);

namespace App\Models;

final readonly class CacheResult
{
	public function __construct(
		public bool $found,
		public mixed $value
	) { }
}