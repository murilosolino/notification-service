<?php

declare(strict_types=1);

namespace App\Service\Interfaces;

use App\Dto\NotificationDto;
use App\Model\NotificationModel;

interface NotificationServiceInterface
{
    public function createNotification(NotificationDto $dto): NotificationModel;
}
