<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\FileProcessingPipeline;

final readonly class Application
{
	public function __construct(
		private readonly FileProcessingPipeline $pipeline
	) { }

	public function run()
	{
		$this->pipeline->execute('example.txt');
	}
}