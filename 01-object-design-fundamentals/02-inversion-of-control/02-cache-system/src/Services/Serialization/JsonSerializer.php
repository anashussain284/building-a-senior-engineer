<?php
declare(strict_types=1);

namespace App\Services\Serialization;

use App\Contracts\Serializer;
use RuntimeException;

final class JsonSerializer implements Serializer
{
	public function serialize(mixed $value): string
	{
		$encoded = json_encode($value, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
		return $encoded;
	}

	public function unserialize(string $value): mixed
	{
		return json_decode($value, true, 512, JSON_THROW_ON_ERROR);
	}

}