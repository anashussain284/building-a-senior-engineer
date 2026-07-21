<?php
declare(strict_types=1);

namespace App\Services\Channels;

use App\Models\Notification;
use App\Models\NotificationResult;
use App\Contracts\NotificationChannel;

final class EmailChannel implements NotificationChannel
{
	public function send(Notification $notification): NotificationResult
	{
		$status = true;
		$successMessage = "Email sent successfully to {$notification->recipient}";
		$failureMessage = "Email send failed to {$notification->recipient}";

		return new NotificationResult(
			isSuccessful: $status,
			channel: 'Email',
			response: ($status) ? $successMessage : $failureMessage
		);
	}
}