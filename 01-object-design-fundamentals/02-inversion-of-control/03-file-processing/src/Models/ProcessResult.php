<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\FileData;

final readonly class ProcessResult
{
	public function __construct(
		public bool $isSuccess,
		public FileData $file
	) {}
}