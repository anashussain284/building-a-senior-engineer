<?php
declare(strict_types=1);

namespace App\Contracts;

interface Notifier
{
	public function send(string $message): void;
}