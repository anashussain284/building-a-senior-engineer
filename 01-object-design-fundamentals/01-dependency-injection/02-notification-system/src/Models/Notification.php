<?php
declare(strict_types=1);

namespace App\Models;

final readonly class Notification
{
	public function __construct(
		public string $recipient,
		public string $subject,
		public string $message
	) { }

	public function withMessage(string $newMessage): self
	{
		return new self($this->recipient, $this->subject, $newMessage);
	}
}