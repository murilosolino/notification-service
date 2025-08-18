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

namespace App\Controller;

use Hyperf\HttpServer\Contract\ResponseInterface as ContractResponseInterface;
use Psr\Http\Message\ResponseInterface;

class HealthCheckControlller extends AbstractController
{
    public function __invoke(ContractResponseInterface $response): ResponseInterface
    {
        return $response->json([])->withStatus(200);
    }
}
