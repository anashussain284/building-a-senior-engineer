<?php
declare(strict_types=1);

namespace App\Services\Logging;

use App\Contracts\Logger;

final class ConsoleLogger implements Logger
{
	public function info(string $message): void
	{
		$timestamp = date('Y-m-d H:i:s');
		echo "[{$timestamp}] LOCAL.info: {$message}" . PHP_EOL;
	}
}