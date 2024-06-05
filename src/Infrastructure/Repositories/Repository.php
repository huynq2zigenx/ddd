<?php

namespace Infrastructure\Repositories;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Repository implements RepositioryInterface
{
    public function __construct(
        private Builder $query,
        private DatabaseManager $database
    ) {
    }

    public function all(): Collection
    {
        return $this->query->get()->toArray();
    }

    public function find(string $id): null|object
    {
        return $this->query->findOrFail(id: $id);
    }

    public function create(object $entity): void
    {
        $this->database->transaction(
            callback: fn() => $this->query->create(
                attributes: $entity->toArray()
            ),
            attemps: 3
        );
    }

    public function update(string $id, object $entity): void
    {
        $this->database->transaction(
            callback: fn() => $this->query
                ->where($id)
                ->update(values: $entity->toArray()),
            attemps: 3
        );
    }

    public function delete(string $id): void
    {
        $this->database->transaction(
            callback: fn() => $this->query->where($id)->delete(),
            attemps: 3
        );
    }
}
