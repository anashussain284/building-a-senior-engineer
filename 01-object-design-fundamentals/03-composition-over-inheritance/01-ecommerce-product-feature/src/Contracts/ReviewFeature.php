<?php
declare(strict_types=1);

namespace App\Contracts;

interface ReviewFeature
{
	public function summary(): string;
}