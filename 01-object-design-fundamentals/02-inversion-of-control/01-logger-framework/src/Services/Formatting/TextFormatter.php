<?php
declare(strict_types=1);

namespace App\Services\Formatting;

use App\Contracts\Formatter;
use App\Models\LogEntry;

final class TextFormatter implements Formatter
{
	public function format(LogEntry $entry): string
	{
		return "[{$entry->timestamp}] [{$entry->level}] : {$entry->message}";
	}
}