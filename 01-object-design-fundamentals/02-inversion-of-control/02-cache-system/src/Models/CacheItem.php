<?php
declare(strict_types=1);

namespace App\Models;

final readonly class CacheItem
{
	public function __construct(
		public string $key,
		public mixed $value
	) { }
}