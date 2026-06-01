<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
#[UseFactory(UserFactory::class)]
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    // Relationships    
    /**
     * documents
     *
     * @return HasMany
     */
    public function documents(): HasMany {
        return $this->hasMany(Document::class);
    }
    
    /**
     * conversations
     *
     * @return HasMany
     */
    public function conversations(): HasMany {
        return $this->hasMany(Conversation::class);
    }
        
    /**
     * casts
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
