<?php
declare(strict_types=1);

namespace App\Contracts;

interface NotificationFeature
{
	public function channel(): string;
}