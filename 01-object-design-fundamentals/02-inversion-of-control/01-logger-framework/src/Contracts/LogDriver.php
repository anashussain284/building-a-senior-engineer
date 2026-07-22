<?php
declare(strict_types=1);

namespace App\Contracts;

interface LogDriver
{
	public function write(string $message): void;
}