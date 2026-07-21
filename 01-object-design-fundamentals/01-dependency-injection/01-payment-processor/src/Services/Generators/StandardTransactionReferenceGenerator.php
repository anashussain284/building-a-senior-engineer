<?php
declare(strict_types=1);

namespace App\Services\Generators;

use App\Contracts\TransactionReferenceGenerator;

class StandardTransactionReferenceGenerator implements TransactionReferenceGenerator
{
	public function generate(string $transactionId): string
	{
		return 'REF-' . strtoupper(substr(md5($transactionId), 0, 8));
	}
}