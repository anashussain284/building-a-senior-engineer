<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\FileLoader;
use App\Contracts\FileProcessor;
use App\Contracts\FileWriter;
use App\Contracts\Logger;

use App\Models\FileData;
use App\Models\ProcessResult;

final readonly class FileProcessingPipeline
{
	public function __construct(
		private readonly FileLoader $fileLoader,
		private readonly FileProcessor $fileProcessor,
		private readonly FileWriter $fileWriter,
		private readonly Logger $logger
	) { }

	public function execute(string $path): ProcessResult
	{
		$this->logger->info("Loading file...");
		$file = $this->fileLoader->load($path);

		$this->logger->info("Processing file...");
		$processedFile = $this->fileProcessor->process($file);

		$this->logger->info("Writing file...");
		$this->fileWriter->write($processedFile);

		return new ProcessResult(
			isSuccess: true,
			file: $processedFile
		);
	}
}