<?php

namespace Modules\DoctorAvailability\Infra\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    public function all(?string $orderColumn = 'id',  ?string $orderDirection = 'DESC'): Collection
    {
        $collection = $this->model->orderBy($orderColumn, $orderDirection);

        return $collection->get();
    }

    public function find($id, $relations = []): ?Model
    {
        return $this->model->with($relations)->find($id);
    }

    public function findBy(array $criteria, ?string $orderColumn = 'id',  ?string $orderDirection = 'DESC'): Collection
    {
        return $this->model
            ->where($criteria)
            ->orderBy($orderColumn, $orderDirection)
            ->get();
    }

    public function create(array $data): ?Model
    {
        $model = clone $this->model;
        if ($model->fill($data)->save()) {
            return $model;
        }

        return null;
    }

    public function update(array $data): ?Model
    {
        if (!isset($data['id'])) {
            return null;
        }
        $model = $this->find($data['id']);

        if ($model) {
            foreach ($data as $field => $val) {
                if ($field === 'id') {
                    continue;
                }
                $model->{$field} = $val;
            }

            if ($model->save()) {
                return $model;
            }
        }

        return null;
    }

    public function delete($id): bool
    {
        return $this->find($id)->delete();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
}
