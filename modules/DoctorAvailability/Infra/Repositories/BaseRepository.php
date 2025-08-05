<?php

namespace Modules\DoctorAvailability\Infra\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var TModel
     */
    protected Model $model;

    /**
     * @return Collection<int, TModel>
     */
    public function all(?string $orderColumn = 'id', ?string $orderDirection = 'DESC'): Collection
    {
        /** @var \Illuminate\Database\Eloquent\Collection<int, TModel> $collection */
        $collection = $this->model->orderBy($orderColumn, $orderDirection)->get();
        if ($collection->isEmpty()) {
            return new Collection;
        }

        return $collection;
    }

    /**
     * @return TModel|null
     */
    public function find($id, $relations = []): ?Model
    {
        return $this->model->with($relations)->find($id);
    }

    /**
     * @return Collection<int, TModel>
     */
    public function findBy(array $criteria, ?string $orderColumn = 'id', ?string $orderDirection = 'DESC'): Collection
    {
        /** @var \Illuminate\Database\Eloquent\Collection<int, TModel> $collection */
        $collection = $this->model
            ->where($criteria)
            ->orderBy($orderColumn, $orderDirection)
            ->get();

        if ($collection->isEmpty()) {
            return new Collection;
        }

        return $collection;
    }

    /**
     * @return TModel|null
     */
    public function create(array $data): ?Model
    {
        $model = clone $this->model;
        if ($model->fill($data)->save()) {
            return $model;
        }

        return null;
    }

    /**
     * @return TModel|null
     */
    public function update(array $data): ?Model
    {
        if (! isset($data['id'])) {
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

    /**
     * @return TModel
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param  TModel  $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
}
