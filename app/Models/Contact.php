<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(classes: ContactObserver::class)]
class Contact extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        "name",
        "gender",
        "email",
        "socials",
        "user_id",
        "company_id",
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    protected function casts(): array
    {
        return [
            "name" => "array",
            "socials" => AsCollection::class,
        ];
    }
}
