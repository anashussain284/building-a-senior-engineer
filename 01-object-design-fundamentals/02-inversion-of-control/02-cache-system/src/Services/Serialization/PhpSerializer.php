<?php
declare(strict_types=1);

namespace App\Services\Serialization;

use App\Contracts\Serializer;

final class PhpSerializer implements Serializer
{
	public function serialize(mixed $value): string
	{
		return serialize($value);
	}

	public function unserialize(string $value): mixed
	{
		return unserialize($value, ['allowed_classes' => false]);
	}
}