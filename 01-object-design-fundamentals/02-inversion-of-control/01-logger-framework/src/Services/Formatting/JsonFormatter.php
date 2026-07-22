<?php
declare(strict_types=1);

namespace App\Services\Formatting;

use App\Contracts\Formatter;
use App\Models\LogEntry;
use JsonException;
use RuntimeException;

final class JsonFormatter implements Formatter
{
	public function format(LogEntry $entry): string
	{
		try {
			return json_encode([
				'level' => $entry->level,
				'message' => $entry->message,
				'timestamp' => $entry->timestamp
			], JSON_PRETTY_PRINT);
		} catch (JsonException $e) {
			throw new RuntimeException("Failed to format log entry to JSON: {$e->getMessage()}", 0, $e);
		}
	}
}