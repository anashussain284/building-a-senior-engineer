<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\FileProcessingPipeline;
use App\Models\ProcessResult;

final readonly class Application
{
	public function __construct(
		private readonly FileProcessingPipeline $pipeline
	) { }

	public function run(string $path = 'example.txt'): ProcessResult
	{
		return $this->pipeline->execute($path);
	}
}