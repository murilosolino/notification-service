<?php

declare(strict_types=1);

namespace NotificationService\App\Model;

use Carbon\Carbon;
use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $channel
 * @property string $recipient
 * @property ?string $subject
 * @property string $body
 * @property string $status
 * @property ?string $source_system
 * @property int $retry_count
 * @property ?Carbon $scheduled_at
 * @property ?Carbon $processing_at
 * @property ?Carbon $sent_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Notification extends Model
{

    protected ?string $table = 'notifications';

    protected array $fillable = [
        'channel',
        'recipient',
        'subject',
        'body',
        'scheduled_at'
    ];

    protected array $casts = [
        'id' => 'integer',
        'retry_count' => 'integer',
        'scheduled_at' => 'datetime',
        'processing_at' => 'datetime',
        'sent_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
