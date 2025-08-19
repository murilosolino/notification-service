<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Controller\HealthCheckControlller;
use App\Controller\NotificationController;
use Hyperf\HttpServer\Router\Router;


Router::post('/notification', NotificationController::class);

Router::get('/', HealthCheckControlller::class);
