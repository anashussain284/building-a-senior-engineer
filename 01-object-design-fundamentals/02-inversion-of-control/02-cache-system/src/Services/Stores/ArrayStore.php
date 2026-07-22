<?php
declare(strict_types=1);

namespace App\Services\Stores;

use App\Contracts\CacheStore;

final class ArrayStore implements CacheStore
{
	private array $items = [];

	public function put(string $key, string $value): void
	{
		$this->items[$key] = $value;
	}

	public function get(string $key): ?string
	{
		return $this->items[$key] ?? null;
	}
}