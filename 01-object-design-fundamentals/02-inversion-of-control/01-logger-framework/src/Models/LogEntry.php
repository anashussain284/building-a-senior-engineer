<?php
declare(strict_types=1);

namespace App\Models;

final readonly class LogEntry
{
	public function __construct(
		public string $level,
		public string $message,
		public string $timestamp
	) { }
}