<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\NotificationDto;
use App\Model\NotificationModel;
use App\Service\Interfaces\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{

    private NotificationModel $notificationModel;

    public function __construct(NotificationModel $notificationModel)
    {
        $this->notificationModel = $notificationModel;
    }

    public function createNotification(NotificationDto $dto): void
    {
        $data = $dto->toArray();

        $this->notificationModel::create($data);
    }
}
