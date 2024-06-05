<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'type',
        'user_id',
        'recruit_id'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recruits(): BelongsTo
    {
        return $this->belongsTo(Recruit::class, 'recruit_id');
    }
}
