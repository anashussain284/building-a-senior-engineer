<?php
declare(strict_types=1);

namespace App\Contracts;

interface Serializer
{
	public function serialize(mixed $value): string;
	public function unserialize(string $value): mixed;
}