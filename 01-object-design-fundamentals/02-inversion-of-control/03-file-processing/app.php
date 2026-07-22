<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\FileProcessingPipeline;
use App\Services\Loaders\LocalFileLoader;
use App\Services\Processors\UppercaseProcessor;
use App\Services\Processors\LineCounterProcessor;
use App\Services\Writers\ConsoleWriter;
use App\Services\Logging\ConsoleLogger;
use App\Services\Application;

$localFileLoader = new LocalFileLoader();
$uppercaseProcessor = new UppercaseProcessor();
$lineCounterProcessor = new LineCounterProcessor();
$consoleWriter = new ConsoleWriter();
$consoleLogger = new ConsoleLogger();

$fileProcessingPipeline = new FileProcessingPipeline(
	fileLoader: $localFileLoader,
	fileProcessor: $lineCounterProcessor,
	fileWriter: $consoleWriter,
	logger: $consoleLogger
);

$application = new Application($fileProcessingPipeline);
$application->run();