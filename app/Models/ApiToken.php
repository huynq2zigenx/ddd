<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Sanctum\PersonalAccessToken;

final class ApiToken extends PersonalAccessToken
{
    use HasUlids;

    protected $table = 'personal_access_tokens';

}