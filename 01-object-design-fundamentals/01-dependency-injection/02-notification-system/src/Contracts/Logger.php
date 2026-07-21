<?php
declare(strict_types=1);

namespace App\Contracts;

interface Logger
{
	public function info(string $message): void;
}