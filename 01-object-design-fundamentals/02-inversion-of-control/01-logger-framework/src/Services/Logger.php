<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Formatter;
use App\Contracts\LogDriver;
use App\Contracts\Logger as LoggerContract;
use App\Contracts\TimestampProvider;
use App\Models\LogEntry;
use App\Models\LogLevel;

final readonly class Logger implements LoggerContract
{
	public function __construct(
		private LogDriver $driver,
		private Formatter $formatter,
		private TimestampProvider $timestampProvider
	) { }

	public function info(string $message): void
	{
		$this->log(LogLevel::INFO->value, $message);
	}

	public function error(string $message): void
	{
		$this->log(LogLevel::ERROR->value, $message);
	}

	public function warning(string $message): void
	{
		$this->log(LogLevel::WARNING->value, $message);
	}
	
	public function log(string $level, string $message): void
	{
		$entry = new LogEntry(
			level: $level,
			message: $message,
			timestamp: $this->timestampProvider->now()
		);

		$formatted = $this->formatter->format($entry);
		$this->driver->write($formatted);
	}
}