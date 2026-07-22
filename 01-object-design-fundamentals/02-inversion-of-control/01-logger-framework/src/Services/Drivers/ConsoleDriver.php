<?php
declare(strict_types=1);

namespace App\Services\Drivers;

use App\Contracts\LogDriver;

final class ConsoleDriver implements LogDriver
{
	public function write(string $message): void
	{
		echo $message . PHP_EOL;
	}
}