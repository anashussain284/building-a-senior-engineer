<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Container;
use App\Contracts\Formatter;
use App\Contracts\LogDriver;
use App\Contracts\TimestampProvider;
use App\Contracts\Logger as LoggerContract;

use App\Services\Drivers\ConsoleDriver;
use App\Services\Formatting\JsonFormatter;
use App\Services\Logger;
use App\Services\Time\CurrentTimestampProvider;
use App\Services\Application;

$container = new Container();

$container->set(LogDriver::class, fn () => new ConsoleDriver());
$container->set(Formatter::class, fn () => new JsonFormatter());
$container->set(TimestampProvider::class, fn () => new CurrentTimestampProvider());

$container->set(
    LoggerContract::class,
    fn (Container $c) => new Logger(
        driver: $c->get(LogDriver::class),
        formatter: $c->get(Formatter::class),
        timestampProvider: $c->get(TimestampProvider::class)
    )
);

$container->set(
    Application::class,
    fn (Container $c) => new Application(
        logger: $c->get(LoggerContract::class)
    )
);

$app = $container->get(Application::class);
$app->run();