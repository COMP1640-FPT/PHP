<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getModel();

    public function getUserByRole($role);

    public function getUserByCode($code);
}
