<?php
declare(strict_types=1);

namespace App\Services\Reviews;

use App\Contracts\ReviewFeature;

final class SimpleReviews implements ReviewFeature
{
	public function __construct(private readonly float $rating) {}

	public function summary(): string
	{
		return "Rating: {$this->rating}";
	}
}