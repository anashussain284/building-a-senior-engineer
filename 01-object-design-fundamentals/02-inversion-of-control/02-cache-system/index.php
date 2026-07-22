<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Container;

use App\Contracts\CacheInterface;
use App\Services\CacheManager;

use App\Contracts\CacheStore;
use App\Services\Stores\FileStore;

use App\Contracts\Logger;
use App\Services\Logging\ConsoleLogger;

use App\Contracts\Serializer;
use App\Services\Application;
use App\Services\Serialization\JsonSerializer;

$container = new Container();

$container->set(CacheStore::class, fn () => new FileStore('Cache'));
$container->set(Logger::class, fn () => new ConsoleLogger());
$container->set(Serializer::class, fn () => new JsonSerializer());

$container->set(CacheInterface::class, fn (Container $c) => new CacheManager(
	cacheStore: $c->get(CacheStore::class),
	logger: $c->get(Logger::class),
	serializer: $c->get(Serializer::class)
));

$app = $container->get(Application::class);
$app->run();