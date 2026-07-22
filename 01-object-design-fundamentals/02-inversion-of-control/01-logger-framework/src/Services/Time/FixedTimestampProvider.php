<?php
declare(strict_types=1);

namespace App\Services\Time;

use App\Contracts\TimestampProvider;

final readonly class FixedTimestampProvider implements TimestampProvider
{
	public function __construct(private string $timestamp) {}

	public function now(): string
	{
		return $this->timestamp;
	}
}