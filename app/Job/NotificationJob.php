<?php

namespace App\Job;

use App\Model\NotificationModel;
use DateTime;
use Hyperf\AsyncQueue\Job;
use Hyperf\Contract\StdoutLoggerInterface;

class NotificationJob extends Job
{
    private StdoutLoggerInterface $logger;

    public function __construct(
        private int $notificationId,
        StdoutLoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function handle()
    {

        $notification = NotificationModel::find($this->notificationId);

        if ($notification && $notification->status === 'pending') {
            $this->logger->info(sprintf('Enviando notificação #%d para %s', $notification->id, $notification->recipient));
            sleep(2);

            $notification->status = 'sent';
            $notification->sent_at = new DateTime();
            $notification->save();
            $this->logger->info(sprintf('Notificação #%d enviada com sucesso.', $notification->id));
        } else {
            $this->logger->warning(sprintf('Notificação #%d não encontrada ou já processada.', $this->notificationId));
        }
    }
}
