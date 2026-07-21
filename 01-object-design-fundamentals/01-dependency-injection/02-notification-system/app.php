<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Notification;
use App\Services\NotificationManager;
use App\Services\Channels\SmsChannel;
use App\Services\Channels\EmailChannel;
use App\Services\Formatting\PlainTextFormatter;
use App\Services\Logging\ConsoleLogger;
use App\Services\Logging\FileLogger;

$notification = new Notification(
	recipient: "Anas",
	subject: "Greeting message",
	message: "Hope you are doing well..."
);

$smsChannel = new SmsChannel();
$emailChannel = new EmailChannel();
$plainTextFormatter = new PlainTextFormatter();
$consoleLogger = new ConsoleLogger();
$fileLogger = new FileLogger();

$notificationManager = new NotificationManager(
	logger: $consoleLogger,
	formatter: $plainTextFormatter,
	channel: $emailChannel
);

$notificationManager->send($notification);