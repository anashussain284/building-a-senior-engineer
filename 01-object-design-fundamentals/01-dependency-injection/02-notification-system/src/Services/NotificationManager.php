<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Logger;
use App\Contracts\MessageFormatter;
use App\Contracts\NotificationChannel;
use App\Models\Notification;
use App\Models\NotificationResult;

final readonly class NotificationManager
{
	public function __construct(
		private Logger $logger,
		private MessageFormatter $formatter,
		private NotificationChannel $channel
	) { }

	public function send(Notification $notification): NotificationResult
	{
		$this->logger->info("Preparing notification for {$notification->recipient}");

		$formattedMessage = $this->formatter->format($notification->message);

		$this->logger->info("Formatted message: {$formattedMessage}");

		$notification = $notification->withMessage($formattedMessage);

		$notificationResult = $this->channel->send($notification);

		$this->logger->info($notificationResult->response);

		return $notificationResult;
	}
}