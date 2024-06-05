<?php

namespace Domains\Apply\Entities;

use App\Models\Contact;
use DateTimeInterface;
use Domains\Apply\ValueObjects\EmailObject;
use Domains\Apply\ValueObjects\NameObject;

class ContactEntity
{
    public function __construct(
        public NameObject $name,
        public EmailObject $email,
        public null|object $socials,
        public null|DateTimeInterface $birthday
    ) {
    }

    public static function fromEloquent(Contact $contact): ContactEntity
    {
        return new ContactEntity(
            name: $contact->name,
            email: new EmailObject(email: $contact->email),
            socials: $contact->socials ?? null,
            birthday: $contact->birthday
        );
    }
}
