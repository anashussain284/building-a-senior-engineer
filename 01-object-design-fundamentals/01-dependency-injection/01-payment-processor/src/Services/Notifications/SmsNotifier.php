<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\Notifier;

final class SmsNotifier implements Notifier
{
	public function send(string $message): void
	{
		echo "SMS {$message}" . PHP_EOL;
	}
}