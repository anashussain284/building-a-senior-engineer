<?php
declare(strict_types=1);

namespace App\Contracts;

interface CurrencyFormatter
{
	public function format(int $amountInPaise, string $currency): string;
}