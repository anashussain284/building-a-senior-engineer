<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\FileData;

interface FileProcessor
{
	public function process(FileData $file): FileData;
}