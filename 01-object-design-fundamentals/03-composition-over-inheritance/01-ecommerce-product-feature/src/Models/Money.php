<?php
declare(strict_types=1);

namespace App\Models;

/**
 * 
 */
final readonly class Money
{
	public function __construct(
		public int $amountInCent,
		public string $currency
	) { }

	public function format(): string
	{
		$amountInDollar = round($this->amountInCent, 2);
		return "{$this->currency} {$amountInDollar}";
	}
}