<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Logger;

final readonly class Application
{
	public function __construct(private readonly Logger $logger) { }

	public function run(): void
	{
		$this->logger->info('Application started.');
		$this->logger->error('Sample error message.');
		$this->logger->warning('System running.');
	}
}