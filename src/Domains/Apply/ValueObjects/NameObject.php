<?php

namespace Domains\Apply\ValueObjects;

final readonly class NameObject
{
    public function __construct(
        public string $first,
        public null|string $middle,
        public null|string $last
    ) {
    }

    public function __toString(): string
    {
        return "{$this->first} {$this->last}";
    }

    public static function make(array $data): NameObject
    {
        return new NameObject(
            first: $data["first"],
            middle: $data["middle"] ?? null,
            last: $data["last"] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            "first" => $this->first,
            "middle" => $this->middle,
            "last" => $this->last,
        ];
    }
}
