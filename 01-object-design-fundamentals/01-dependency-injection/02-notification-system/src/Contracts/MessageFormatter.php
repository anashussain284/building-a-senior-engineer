<?php
declare(strict_types=1);

namespace App\Contracts;

interface MessageFormatter
{
	public function format(string $message): string;
}