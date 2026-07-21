<?php
declare(strict_types=1);

namespace App\Services\Channels;

use App\Contracts\NotificationChannel;
use App\Models\Notification;
use App\Models\NotificationResult;

final class SmsChannel implements NotificationChannel
{
	public function send(Notification $notification): NotificationResult
	{
		$status = false;
		$successMessage = "SMS sent successfully to {$notification->recipient}";
		$failureMessage = "SMS send failed to {$notification->recipient}";

		return new NotificationResult(
			isSuccessful: $status,
			channel: 'SMS',
			response: ($status) ? $successMessage : $failureMessage
		);
	}
}