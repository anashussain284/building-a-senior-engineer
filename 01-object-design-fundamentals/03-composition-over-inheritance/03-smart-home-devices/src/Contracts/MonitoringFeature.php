<?php
declare(strict_types=1);

namespace App\Contracts;

interface MonitoringFeature
{
	public function description(): string;
}