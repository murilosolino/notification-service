<?php

namespace App\Job;

use App\Model\NotificationModel;
use DateTime;
use Hyperf\AsyncQueue\Job;
use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\StdoutLoggerInterface;

class NotificationJob extends Job
{
    public function __construct(
        private int $notificationId
    ) {}

    public function handle()
    {
        $logger = ApplicationContext::getContainer()->get(StdoutLoggerInterface::class);

        $notification = NotificationModel::find($this->notificationId);

        if ($notification && $notification->status === 'pending') {
            $logger->info(sprintf('Enviando notificação #%d para %s', $notification->id, $notification->recipient));
            sleep(2);

            $notification->status = 'sent';
            $notification->sent_at = new DateTime();
            $notification->save();
            $logger->info(sprintf('Notificação #%d enviada com sucesso.', $notification->id));
        } else {
            $logger->warning(sprintf('Notificação #%d não encontrada ou já processada.', $this->notificationId));
        }
    }
}
