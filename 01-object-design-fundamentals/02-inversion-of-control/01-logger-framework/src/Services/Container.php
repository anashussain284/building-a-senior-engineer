<?php
declare(strict_types=1);

namespace App\Services;

use Closure;
use RuntimeException;
use ReflectionClass;
use ReflectionNamedType;

final class Container
{
	/**
	 * @var array<string, Closure(self): mixed>
	 */
	private array $bindings = [];

	/**
	 * @var array<string, mixed>
	 */
	private array $instances = [];

	public function set(string $id, Closure $concrete): void
	{
		$this->bindings[$id] = $concrete;
	}

	public function get(string $id): mixed
	{
		if (isset($this->instances[$id])) {
			return $this->instances[$id];
		}

		if (isset($this->bindings[$id])) {
            return $this->bindings[$id]($this);
        }

		return $this->autowire($id);
	}

	private function autowire(string $id): mixed
    {
        if (!class_exists($id)) {
            throw new RuntimeException("Target class [$id] does not exist and is not bound in container.");
        }

        $reflector = new ReflectionClass($id);

        if (!$reflector->isInstantiable()) {
            throw new RuntimeException("Target [$id] is not instantiable (interface or abstract class).");
        }

        $constructor = $reflector->getConstructor();

        if ($constructor === null) {
            return new $id();
        }

        $dependencies = [];
        foreach ($constructor->getParameters() as $parameter) {
            $type = $parameter->getType();

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                    continue;
                }
                throw new RuntimeException("Cannot resolve primitive dependency [\${$parameter->getName()}] in class [$id].");
            }

            $dependencies[] = $this->get($type->getName());
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}