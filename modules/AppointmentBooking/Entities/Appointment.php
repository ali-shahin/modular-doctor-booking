<?php

namespace Modules\AppointmentBooking\Entities;

use DateTime;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Appointment
{
    public UuidInterface $id;

    public UuidInterface $slot_id;

    public UuidInterface $patient_id;

    public string $patient_name;

    public datetime $reserved_at;

    public function __construct(UuidInterface $slot_id, UuidInterface $patient_id, string $patient_name, DateTime $reserved_at)
    {
        $this->id = $this->generateId();
        $this->slot_id = $slot_id;
        $this->patient_id = $patient_id;
        $this->patient_name = $patient_name;
        $this->reserved_at = $reserved_at;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'slot_id' => $this->slot_id,
            'patient_id' => $this->patient_id,
            'patient_name' => $this->patient_name,
            'reserved_at' => $this->reserved_at,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['slot_id'],
            $data['patient_id'],
            $data['patient_name'],
            $data['reserved_at']
        );
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function generateId(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
