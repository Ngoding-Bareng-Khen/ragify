<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * __construct
     *
     * @param  mixed  $model
     * @return void
     */
    public function __construct(private readonly User $model) {}
    
    /**
     * findByEmail
     *
     * @param  mixed $email
     * @return User
     */
    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}
