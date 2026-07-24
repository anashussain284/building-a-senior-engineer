<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\SmartDevice;

final class DevicePresenter
{
	public function show(SmartDevice $device): void
	{
		echo <<<TEXT
DEVICE DETAILS
---------------
Name: {$device->name}
Power: {$device->power()}
Notification: {$device->notification()}

TEXT;
	}
}