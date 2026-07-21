<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Notification;
use App\Models\NotificationResult;

interface NotificationChannel
{
	public function send(Notification $notification): NotificationResult;
}