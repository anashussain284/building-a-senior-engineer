<?php
declare(strict_types=1);

namespace App\Contracts;

interface CacheStore
{
	public function put(string $key, string $value): void;
	public function get(string $key): ?string;
}