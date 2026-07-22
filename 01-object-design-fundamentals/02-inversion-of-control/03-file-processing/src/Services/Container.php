<?php
declare(strict_types=1);

namespace App\Services;

use Closure;
use Reflection;
use ReflectionClass;
use ReflectionNamedType;
use RuntimeException;

final class Container
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

		return $this->autowire($id);
	}

	private function autowire(string $id): object
	{
		if (!class_exists($id)) {
			throw new RuntimeException("Target class [{$id}] does not exist and cannot be autowired.");
		}

		$reflector = new ReflectionClass($id);

		if (!$reflector->isInstantiable()) {
			throw new RuntimeException("Target class [{$id}] is not instantiable.");
		}

		$constructor = $reflector->getConstructor();

		if ($constructor === null) {
			$object = new $id();
			$this->instances[$id] = $object;
			return $object;
		}

		$dependencies = [];
		foreach ($constructor->getParameters() as $parameter) {
			$type = $parameter->getType();

			if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
				throw new RuntimeException(
					"Cannot autowire parameter [{$parameter->getName()}] in class [{$id}] becuase it lacks a class type hint"
				);
			}
			$dependencies[] = $this->get($type->getName());
		}

		$object = $reflector->newInstanceArgs($dependencies);
		$this->instances[$id] = $object;

		return $object;
	}
}