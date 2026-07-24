<?php
declare(strict_types=1);

namespace App\Models;

final readonly class DeviceStatus
{
	public function __construct(
		public bool $online,
		public string $state
	) {}
}