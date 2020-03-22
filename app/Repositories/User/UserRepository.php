<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getUserByRole($role)
    {
        return $this->model->where('role', $role)->orderBy('id', 'DESC')->get();
    }
}
