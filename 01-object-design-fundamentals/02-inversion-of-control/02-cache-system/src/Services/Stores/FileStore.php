<?php
declare(strict_types=1);

namespace App\Services\Stores;

use App\Contracts\CacheStore;

file class FileStore implements CacheStore
{
	public function __construct(readonly private string $directory='Cache') { }

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

		return file_get_contents($filePath);
	}

	private function path(string $key): string
	{
		return $this->directory . '/' . md5($key) . '.cache';
	}
}