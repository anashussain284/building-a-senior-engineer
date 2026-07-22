<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\CacheManager;

final class Application
{
	public function __construct(private readonly CacheManager $cache) {}

	public function run(): void
	{
		$this->cache->put(
			key: 'user',
			value: ['id' => 1, 'name' => 'Anas']
		);

		$result = $this->cache->get('user');

		var_dump($result->value);
	}
}