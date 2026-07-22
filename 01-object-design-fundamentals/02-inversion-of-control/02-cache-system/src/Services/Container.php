<?php
declare(strict_types=1);

namespace App\Services;

use Closure;
use RuntimeException;
use ReflectionClass;
use ReflectionNamedType;

class Container
{
	private array $bindings = [];

	private array $instances = [];

	public function set(string $id, Closure $factory): void
	{
		$this->bindings[$id] = $factory;
	}

	public function get(string $id): object
	{
		if (isset($this->instances[$id])) {
			return $this->instances[$id];
		}

		if (isset($this->bindings[$id])) {
			$object = ($this->bindings[$id])($this);
			$this->instances[$id] = $object;
			return $object;
		}

		if (!class_exists($id)) {
			throw new RuntimeException("Cannot resolve target [{$id}]: No binding or class found.");
		}

		$reflector = new ReflectionClass($id);

		if (!$reflector->isInstantiable()) {
			throw new RuntimeException("Targe [{$id}] is not intantiable.");
		}

		$constructor = $reflector->getConstructor();

		if ($constructor === null) {
			$object = new $id();
			$this->instances[$id] = $object;
			return $object;
		}

		$parameters = $constructor->getParameters();
		$dependencies = [];

		foreach ($parameters as $param) {
			$type = $param->getType();

			if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
				if ($param->isDefaultValueAvailable()) {
				$dependencies[] = $param->getDefaultValue();
				continue;
				}
				throw new RuntimeException("Cannot resolve primitive parameter \${$param->getName()} in [{$id}].");
			}
			$dependencies[] = $this->get($type->getName());
		}

		$object = $reflector->newInstanceArgs($dependencies);
		$this->instances[$id] = $object;

		return $object; 
	}
}