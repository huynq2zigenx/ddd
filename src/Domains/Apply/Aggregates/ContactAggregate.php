<?php

namespace Domains\Apply\Aggregates;

use Domains\Apply\Entities\ContactEntity;

class ContactAggregate
{
    public function __construct(private ContactEntity $contact)
    {
    }
}
