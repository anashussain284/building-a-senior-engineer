<?php
declare(strict_types=1);

namespace App\Contracts;

interface TimestampProvider
{
	public function now(): string;
}