<?php

declare(strict_types=1);

namespace NotificationService\App\Dto;

use DateTime;

class NotificationDto
{

    private string $channel;
    private string $recipient;
    private ?string $subject;
    private string $body;
    private ?DateTime $scheduled_at;

    public function __construct(
        string $channel,
        string $recipient,
        ?string $subject,
        string $body,
        ?DateTime $scheduled_at
    ) {
        $this->channel = $channel;
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->body = $body;
        $this->scheduled_at = $scheduled_at;
    }

    public function toArray(): array
    {
        return [
            'channel' => $this->channel,
            'recipient' => $this->recipient,
            'subject' => $this->subject,
            'body' => $this->body,
            'scheduled_at' => $this->scheduled_at,
        ];
    }
}
