<?php

declare(strict_types=1);

namespace App\Service\Interfaces;

use App\Dto\NotificationDto;

interface NotificationServiceInterface
{
    public function createNotification(NotificationDto $dto): void;
}
