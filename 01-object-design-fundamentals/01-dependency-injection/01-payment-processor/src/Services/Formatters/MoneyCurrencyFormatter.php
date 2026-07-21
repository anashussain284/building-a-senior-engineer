<?php
declare(strict_types=1);

namespace App\Services\Formatters;

use App\Contracts\CurrencyFormatter;

class MoneyCurrencyFormatter implements CurrencyFormatter
{
	public function format(int $amountInPaise, string $currency): string
	{
		$formattedAmount = number_format($amountInPaise / 100, 2);
		return "{$currency} {$formattedAmount}";
	}
}