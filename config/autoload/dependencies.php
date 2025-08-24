<?php

declare(strict_types=1);

use App\Service\Interfaces\NotificationServiceInterface;
use App\Service\NotificationService;

return [
    // Aqui dizemos: "Quando alguém pedir a Interface, entregue a Classe"
    NotificationServiceInterface::class => NotificationService::class,
];
