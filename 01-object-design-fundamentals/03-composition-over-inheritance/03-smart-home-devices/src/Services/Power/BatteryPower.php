<?php
declare(strict_types=1);

namespace App\Services\Power;

use App\Contracts\PowerFeature;

final class BatteryPower implements PowerFeature
{
	public function source(): string
	{
		return 'Battery Powered';
	}
}