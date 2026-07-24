<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\NotificationFeature;

final class PushNotification implements NotificationFeature
{
	public function channel(): string
	{
		return 'Mobile Push Notification';
	}
}