<?php

namespace Domains\Apply\ValueObjects;

final class EmailObject
{
    public function __construct(public readonly null|string $email)
    {
        if ($email === null) {
            $this->email = $email;
        }

        if (filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
