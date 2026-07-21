<?php
declare(strict_types=1);

namespace App\Services\Logging;

use App\Contracts\AuditLogger;

class FileAuditLogger implements AuditLogger
{
	public function log(string $action, array $context = []): void
	{
		$entry = sprintf("[%s] AUDIT: %s | %s", date('Y-m-d H:i:s'), $action, json_encode($context));
		echo PHP_EOL . $entry . PHP_EOL;
	}
}