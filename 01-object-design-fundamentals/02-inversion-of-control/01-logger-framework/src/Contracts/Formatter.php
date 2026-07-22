<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\LogEntry;

interface Formatter
{
	public function format(LogEntry $entry): string;
}