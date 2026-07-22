<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\CacheResult;
use App\Contracts\CacheStore;
use App\Contracts\Logger;
use App\Contracts\Serializer;

final class CacheManager
{
	public function __construct(
		private CacheStore $cacheStore,
		private Logger $logger,
		private Serializer $serializer
	) { }

	public function put(string $key, mixed $value): void
	{
		$this->logger->info("Caching {$key}");

		$serialized = $this->serializer->serialize($value);

		$this->cacheStore->put($key, $serialized);
	}

	public function get(string $key): CacheResult
	{
		$this->logger->info("Loading {$key}");

		$value = $this->cacheStore->get($key);

		if ($value === null) {
			return new CacheResult(found: false, value: null);
		}

		return new CacheResult(found: true, value: $this->serializer->unserialize($value));
	}
}