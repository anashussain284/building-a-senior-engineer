<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\Notifier;

final class SlackNotifier implements Notifier
{
	public function send(string $message): void
	{
		echo "Slack {$message}" . PHP_EOL;
	}
}