<?php
declare(strict_types=1);

namespace App\Services\Stores;

use App\Contracts\CacheStore;

final class FileStore implements CacheStore
{
	public function __construct(private readonly string $directory='Cache') {}

	public function put(string $key, string $value): void
	{
		file_put_contents($this->path($key), $value);
	}

	public function get(string $key): ?string
	{
		$filePath = $this->path($key);

		if (!file_exists($filePath)) {
			return null;
		}

		$content = file_get_contents($filePath);
		return $content !== false ? $content : null;
	}

	private function path(string $key): string
	{
		return $this->directory . '/' . md5($key) . '.cache';
	}
}