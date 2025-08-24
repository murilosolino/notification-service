<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\NotificationDto;
use App\Job\NotificationJob;
use App\Model\NotificationModel;
use App\Service\Interfaces\NotificationServiceInterface;

use function Hyperf\AsyncQueue\dispatch;
use function Hyperf\Support\make;

class NotificationService implements NotificationServiceInterface
{

    private NotificationModel $notificationModel;

    public function __construct(
        NotificationModel $notificationModel
    ) {
        $this->notificationModel = $notificationModel;
    }

    public function createNotification(NotificationDto $dto): NotificationModel
    {
        $data = $dto->toArray();

        $notification = $this->notificationModel::create($data);

        $job = new NotificationJob($notification->id);

        dispatch($job);
        return $notification;
    }
}
