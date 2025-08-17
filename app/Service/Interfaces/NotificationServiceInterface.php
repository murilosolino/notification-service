<?php

declare(strict_types=1);

namespace NotificationService\App\Service\Interfaces;

use NotificationService\App\Dto\NotificationDto;
use NotificationService\App\Model\Notification;

interface NotificationServiceInterface
{
    public function createNotification(NotificationDto $dto): void;
}
