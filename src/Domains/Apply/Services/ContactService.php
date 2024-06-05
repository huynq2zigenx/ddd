<?php

namespace Domains\Apply\Services;

use App\Models\Contact;
use Domains\Apply\Entities\ContactEntity;
use Domains\Apply\Repositories\ContactRepository;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    public function __construct(private ContactRepository $repository)
    {
    }

    public function all(): Collection
    {
        return $this->repository
            ->all()
            ->map(
                callback: fn(
                    Contact $contact
                ): ContactEntity => ContactEntity::fromEloquent(
                    contact: $contact
                )
            );
    }
}
