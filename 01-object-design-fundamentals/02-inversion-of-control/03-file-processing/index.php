<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Container;
use App\Services\Application;
use App\Services\FileProcessingPipeline;

use App\Contracts\FileLoader;
use App\Services\Loaders\LocalFileLoader;

use App\Contracts\FileWriter;
use App\Services\Writers\ConsoleWriter;

use App\Contracts\Logger;
use App\Services\Logging\ConsoleLogger;

use App\Contracts\FileProcessor;
use App\Services\Processors\LineCounterProcessor;
use App\Services\Processors\UppercaseProcessor;

$container = new Container();

$container->set(FileLoader::class, fn () => new LocalFileLoader());
$container->set(FileWriter::class, fn () => new ConsoleWriter());
$container->set(Logger::class, fn() => new ConsoleLogger());

$container->set(
	FileProcessingPipeline::class,
	fn (Container $c) => new FileProcessingPipeline(
		fileLoader: $c->get(FileLoader::class),
		processors: [
			new LineCounterProcessor(),
			new UppercaseProcessor(),
		],
		fileWriter: $c->get(FileWriter::class),
		logger: $c->get(Logger::class)
	)
);

$app = $container->get(Application::class);
$app->run('example.txt');