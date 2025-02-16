<?php

namespace Modules\AppointmentManagement\Core\Enums;

enum AppointmentStatusEnum: int
{
    case PENDING = 0;
    case COMPLETED = 1;
    case CANCELLED = 2;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }
}
