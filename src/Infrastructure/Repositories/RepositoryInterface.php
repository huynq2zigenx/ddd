<?php

namespace Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property-read DatabaseManager $database
 * @property-read Builder $query
 */
interface RepositioryInterface
{
    public function all(): Collection;

    public function find(string $id): null|object;

    public function create(object $entity): void;

    public function update(string $id, object $entity): void;

    public function delete(string $id): void;
}
