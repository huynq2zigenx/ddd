<?php

namespace Domains\Apply\Events;

use Domains\Apply\Entities\ContactEntity;
use Infrastructure\Events\DomainEvent;

class ContactCreated extends DomainEvent
{
    public function __construct(private readonly ContactEntity $contact)
    {
    }
}
