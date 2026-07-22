<?php
declare(strict_types=1);

namespace App\Services\Writers;

use App\Contracts\FileWriter;
use App\Models\FileData;

final class ConsoleWriter implements FileWriter
{
	public function write(FileData $file): void
	{
		echo "==={$file->name}===" . PHP_EOL;
		echo "{$file->content}" . PHP_EOL;
	}
}