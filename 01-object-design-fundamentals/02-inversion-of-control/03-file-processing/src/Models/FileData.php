<?php
declare(strict_types=1);

namespace App\Models;

final readonly class FileData
{
	public function __construct(
		public string $name,
		public string $content
	) {}
}