<?php
declare(strict_types=1);

namespace App\Services\Processors;

use App\Contracts\FileProcessor;
use App\Models\FileData;

final class UppercaseProcessor implements FileProcessor
{
	public function process(FileData $file): FileData
	{
		return new FileData(
			name: $file->name,
			content: strtoupper($file->content)
		);
	}
}