<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\NotificationModel;
use App\Request\NotificationRequest;
use App\Service\Interfaces\NotificationServiceInterface;
use App\Service\NotificationService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as ContractResponseInterface;
use Psr\Http\Message\ResponseInterface;

class NotificationController extends AbstractController
{
    public function __construct(private NotificationServiceInterface $notificationService) {}

    public function __invoke(NotificationRequest $request, ContractResponseInterface $response): ResponseInterface
    {
        $dto = $request->getDto();

        $notification = $this->notificationService->createNotification($dto);

        return $response->json([
            'message' => 'Notification created successfully',
            'notification_id' => $notification->id,
        ])->withStatus(201);
    }
}
