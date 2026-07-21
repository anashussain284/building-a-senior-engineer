<?php
declare(strict_types=1);

namespace App\Services\Logging;

use App\Contracts\Logger;

final class FileLogger implements Logger
{
	public function __construct(private string $logFilePath = 'audit.log') { }

	public function info(string $message): void
	{
		$timestamp = date("Y-m-d H:i:s");
		$content = "[$timestamp] info.LOCAL: {$message}";
		file_put_contents($this->logFilePath, $content . PHP_EOL, FILE_APPEND);
	}
}