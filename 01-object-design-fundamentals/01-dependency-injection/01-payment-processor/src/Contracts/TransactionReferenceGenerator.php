<?php
declare(strict_types=1);

namespace App\Contracts;

interface TransactionReferenceGenerator
{
	public function generate(string $transactionId): string;
}