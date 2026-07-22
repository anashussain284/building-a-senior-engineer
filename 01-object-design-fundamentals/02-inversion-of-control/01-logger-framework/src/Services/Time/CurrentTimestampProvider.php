<?php
declare(strict_types=1);

namespace App\Services\Time;

use App\Contracts\TimestampProvider;

final class CurrentTimestampProvider implements TimestampProvider
{
	public function now(): string
	{
		return date("Y-m-d H:i:s");
	}
}