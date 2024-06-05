<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class IndexController
{
    public function __construct(
        private AuthManager $auth
    )
    {}

    public function __invoke(Request $request)
    {
        $contacts = Contact::query()->where(
            column: 'user_id',
            operator: '=',
            value: $this->auth->id()
        )->get();

        //because $contacts is collection
        return ContactResource::collection(resource: $contacts);
    }

}