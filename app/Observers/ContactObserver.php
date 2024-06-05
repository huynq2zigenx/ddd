<?php

namespace App\Observers;

use App\Models\Contact;
use Domains\Apply\Entities\ContactEntity;
use Domains\Apply\Events\ContactCreated;
use Illuminate\Contracts\Events\Dispatcher;

class ContactObserver
{
    public function __construct(private readonly Dispatcher $event)
    {
    }

    public function created(Contact $contact): void
    {
        $this->event->dispatch(
            event: new ContactCreated(
                contact: ContactEntity::fromEloquent($contact)
            )
        );
    }
}
