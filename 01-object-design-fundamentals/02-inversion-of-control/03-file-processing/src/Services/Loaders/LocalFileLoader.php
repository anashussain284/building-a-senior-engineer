<?php
declare(strict_types=1);

namespace App\Services\Loaders;

use App\Contracts\FileLoader;
use App\Models\FileData;
use RuntimeException;

final class LocalFileLoader implements FileLoader
{
	public function load(string $path): FileData
	{
		if (!is_file($path) || !is_readable($path)) {
			throw new RuntimeException("Unable to read the file at path: {$path}.");
		}

		$content = file_get_contents($path);

		if ($content === false) {
			throw new RuntimeException("Failed to load contents from : {$path}.");
		}

		return new FileData(
			name: basename($path),
			content: file_get_contents($path)
		);
	}
}