<?php
declare(strict_types=1);

namespace App\Contracts;

interface AuditLogger
{
	public function log(string $action, array $context = []): void;
}