<?php

namespace App\Casts;

use App\DataObjects\Name;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class NameCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param array $value
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Name::make(
            data: $value['name']
        );
    }

    /**
     * Prepare the given value for storage.
     * @param Name $value
     * @param  array<string, mixed>  $attributes
     * @return array
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return ['name' => $value];
    }
}
