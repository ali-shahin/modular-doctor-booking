<?php

namespace Modules\DoctorAvailability\Infra\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function all();
    public function find($id): ?Model;
    public function findBy(array $criteria): Collection;
    public function create(array $data): ?Model;
    public function update(array $data): ?Model;
    public function delete(int $id): bool;
}
