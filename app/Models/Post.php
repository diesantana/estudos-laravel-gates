<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[Fillable(['title', 'body', 'user_id'])]
class Post extends Model
{
    use HasFactory, Notifiable;

    // Um post tem um usuário
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
