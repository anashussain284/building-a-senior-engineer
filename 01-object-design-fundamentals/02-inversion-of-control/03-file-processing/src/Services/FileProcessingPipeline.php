<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\FileLoader;
use App\Contracts\FileWriter;
use App\Contracts\Logger;
use App\Models\ProcessResult;

final readonly class FileProcessingPipeline
{
	public function __construct(
		private readonly FileLoader $fileLoader,
		private readonly array $processors,
		private readonly FileWriter $fileWriter,
		private readonly Logger $logger
	) { }

	public function execute(string $path): ProcessResult
	{
		$this->logger->info("Loading file from {$path}...");
		$file = $this->fileLoader->load($path);

		foreach ($this->processors as $processor) {
			$this->logger->info("Executing processor: " . $processor::class);
			$processedFile = $processor->process($file);
			$this->logger->info("Writing file output...");
			$this->fileWriter->write($processedFile);
			$this->logger->info("===================");
		}


		return new ProcessResult(
			isSuccess: true,
			file: $processedFile
		);
	}
}