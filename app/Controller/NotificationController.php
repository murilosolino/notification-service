<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\NotificationModel;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as ContractResponseInterface;
use Psr\Http\Message\ResponseInterface;

class NotificationController extends AbstractController
{

    public function __construct(private NotificationModel $notificationModel) {}

    public function store(RequestInterface $request, ContractResponseInterface $response): ResponseInterface
    {
        return $response->json([])->withStatus(200);
    }
}
