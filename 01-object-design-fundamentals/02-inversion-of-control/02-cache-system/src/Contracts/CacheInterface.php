<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\CacheResult;

interface CacheInterface
{
	public function put(string $key, mixed $value): void;
	public function get(string $key): CacheResult;
}