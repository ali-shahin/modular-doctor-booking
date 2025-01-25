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

    public function find($id, ?array $relations = []): ?Model
    {
        if ($relations) {
            return $this->model->with($relations)->find($id);
        }

        return $this->model->find($id);
    }

    public function findBy(array $criteria, ?string $orderColumn = 'id',  ?string $orderDirection = 'DESC'): Collection
    {
        $collection = $this->model;

        foreach ($criteria as $field => $value) {
            $collection = $collection->where($field, $value);
        }

        $collection = $collection->orderBy($orderColumn, $orderDirection);

        return $collection->get();
    }

    public function create(array $data): Model
    {
        foreach ($data as $field => $val) {
            $this->model->{$field} = $val;
        }

        if ($this->model->save()) {
            return $this->model;
        }

        return null;
    }

    public function update(array $data): Model
    {
        $model = $this->find($data['id'] ?? 0);

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
