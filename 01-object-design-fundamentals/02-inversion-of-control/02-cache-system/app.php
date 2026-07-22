<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Application;
use App\Services\CacheManager;
use App\Services\Logging\ConsoleLogger;
use App\Services\Serialization\JsonSerializer;
use App\Services\Serialization\PhpSerializer;
use App\Services\Stores\ArrayStore;
use App\Services\Stores\FileStore;

$arrayStore = new ArrayStore();
$fileStore = new FileStore();
$jsonSerializer = new JsonSerializer();
$phpSerializer = new PhpSerializer();
$consoleLogger = new ConsoleLogger();

$cacheManager = new CacheManager(
	cacheStore: $fileStore,
	logger: $consoleLogger,
	serializer: $jsonSerializer
);

$app = new Application(cache: $cacheManager);
$app->run();