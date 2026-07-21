<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\Notifier;

final class EmailNotifier implements Notifier
{
	public function send(string $message): void
	{
		echo "Email {$message}" . PHP_EOL;
	}
}