<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Application;
use App\Services\Logger;
use App\Services\Drivers\ConsoleDriver;
use App\Services\Formatting\JsonFormatter;
use App\Services\Formatting\TextFormatter;
use App\Services\Time\CurrentTimestampProvider;
use App\Services\Time\FixedTimestampProvider;

$consoleDriver = new ConsoleDriver();
$jsonFormatter = new JsonFormatter();
$textFormatter = new TextFormatter();
$currentTimestampProvider = new CurrentTimestampProvider();
$fixedTimestampProvider = new FixedTimestampProvider('TIME');

$logger = new Logger(
	driver: $consoleDriver,
	formatter: $textFormatter,
	timestampProvider: $currentTimestampProvider
);

$app = new Application(logger: $logger);
$app->run();