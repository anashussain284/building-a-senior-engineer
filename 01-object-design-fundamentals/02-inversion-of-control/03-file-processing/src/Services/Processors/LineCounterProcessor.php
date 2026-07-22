<?php
declare(strict_types=1);

namespace App\Services\Processors;

use App\Contracts\FileProcessor;
use App\Models\FileData;

final class LineCounterProcessor implements FileProcessor
{
	public function process(FileData $file): FileData
	{
		$count = substr_count($file->content, PHP_EOL) + 1;

		return new FileData(
			name: $file->name,
			content: $file->content . PHP_EOL . "Lines: {$count}"
		);
	}
}