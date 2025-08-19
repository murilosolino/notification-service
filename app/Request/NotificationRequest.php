<?php

declare(strict_types=1);

namespace App\Request;

use App\Dto\NotificationDto;
use DateTime;
use Hyperf\Validation\Request\FormRequest;

class NotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'channel' => 'required|string|in:email,sms,push',
            'recipient' => 'required|string',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
            'scheduled_at' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'the :attribute is required',
            'string' => 'the :attribute must be a string',
            'subject.max' => 'the :attribute  must contain a maximum of 255 characters',
            'scheduled_at' => ':attribute must respect the format: :Y-m-d H:i:s'
        ];
    }

    public function getDto(): NotificationDto
    {
        $validated = $this->validated();

        $scheduledAt = null;
        if (!empty($validated['scheduled_at'])) {
            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $validated['scheduled_at']);
            if ($dt !== false) {
                $scheduledAt = $dt;
            }
        }

        return new NotificationDto(
            $validated['channel'],
            $validated['recipient'],
            $validated['subject'] ?? null,
            $validated['body'],
            $scheduledAt
        );
    }
}
