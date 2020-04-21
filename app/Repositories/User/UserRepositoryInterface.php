<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getModel();

    public function getUserByRole($role);

    public function getUserByCode($code);

    public function getStudentByTutor($id);

    public function getTutorByStudent($id);

    public function getStudentsNotAssigned(array $id);

    public function findStudentsById(array $id);
}
