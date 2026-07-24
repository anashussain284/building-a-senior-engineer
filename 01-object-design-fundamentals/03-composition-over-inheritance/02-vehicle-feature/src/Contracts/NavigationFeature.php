<?php
declare(strict_types=1);

namespace App\Contracts;

interface NavigationFeature
{
	public function routeMap(): string;
}