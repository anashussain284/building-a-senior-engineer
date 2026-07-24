<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\DevicePresenter;
use App\Models\SmartDevice;
use App\Services\Notifications\PushNotification;
use App\Services\Power\BatteryPower;

$pushNotification = new PushNotification();
$batteryPower = new BatteryPower();

$ceilingFan = new SmartDevice(
	name: 'Ceiling Fan',
	power: $batteryPower,
	notification: $pushNotification
);
$devicePresenter = new DevicePresenter();
$devicePresenter->show(device: $ceilingFan);