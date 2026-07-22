<?php
declare(strict_types=1);

namespace App\Models;

enum LogLevel: string
{
	case INFO = 'INFO';
	case ERROR = 'ERROR';
	case WARNING = 'WARNING';
}