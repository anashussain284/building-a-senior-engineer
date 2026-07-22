<?php
declare(strict_types=1);

namespace App\Services\Serialization;

use App\Contracts\Serializer;

final class JsonSerializer implements Serializer
{
	public function serialize(mixed $value): string
	{
		return json_encode($value, JSON_PRETTY_PRINT);
	}

	public function unserialize(string $value): mixed
	{
		return json_decode($value, true);
	}

}