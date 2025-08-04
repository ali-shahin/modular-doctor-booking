<?php

namespace Modules\AppointmentManagement\Core\Entities;

use Modules\AppointmentManagement\Core\Enums\AppointmentStatusEnum;

class Appointment
{
    public function __construct(
        public string $id,
        public string $slot_id = '',
        public string $patient_id = '',
        public string $patient_name = '',
        public string $reserved_at = '',
        public int $status = AppointmentStatusEnum::PENDING->value
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['id']) ? $data['id'] : '',
            isset($data['slot_id']) ? $data['slot_id'] : '',
            isset($data['patient_id']) ? $data['patient_id'] : '',
            isset($data['patient_name']) ? $data['patient_name'] : '',
            isset($data['reserved_at']) ? $data['reserved_at'] : '',
            isset($data['status']) ? $data['status'] : AppointmentStatusEnum::PENDING->value
        );
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn ($value) => $value !== null && $value !== '');
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
