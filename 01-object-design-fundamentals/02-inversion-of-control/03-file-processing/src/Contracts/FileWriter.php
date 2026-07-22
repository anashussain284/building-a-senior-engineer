<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\FileData;

interface FileWriter
{
	public function write(FileData $file): void;
}