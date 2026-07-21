<?php
declare(strict_types=1);

namespace App\Models;

final readonly class NotificationResult
{
	public function __construct(
		public bool $isSuccessful,
		public string $channel,
		public string $response
	) { }
}