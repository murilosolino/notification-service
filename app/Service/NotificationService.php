<?php

declare(strict_types=1);

namespace NotificationService\App\Service;

use NotificationService\App\Dto\NotificationDto;
use NotificationService\App\Model\NotificationModel;
use NotificationService\App\Service\Interfaces\NotificationServiceInterface;

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
