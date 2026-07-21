<?php
declare(strict_types=1);

namespace App\Services\Formatting;

use App\Contracts\MessageFormatter;

final class PlainTextFormatter implements MessageFormatter
{
	public function format(string $message): string
	{
		return $message;
	}
}