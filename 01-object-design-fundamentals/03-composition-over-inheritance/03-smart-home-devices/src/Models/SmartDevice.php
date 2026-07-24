<?php
declare(strict_types=1);

namespace App\Models;

use App\Contracts\PowerFeature;
use App\Contracts\NotificationFeature;

final class SmartDevice
{
	public function __construct(
		public readonly string $name,
		private readonly PowerFeature $power,
		private readonly NotificationFeature $notification
	) {}

	public function power(): string
	{
		return $this->power->source();
	}

	public function notification(): string
	{
		return $this->notification->channel();
	}
}