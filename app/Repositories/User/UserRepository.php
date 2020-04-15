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

    public function getUserByCode($code)
    {
        return $this->model->where('code', $code)->get();
    }

    public function getStudentByTutor($id)
    {
        return $this->model->where('id', $id)->with('students')->first();
    }

    public function getTutorByStudent($id)
    {
        return $this->model->where('id', $id)->with('tutors')->first();
    }

    public function getStudentsNotAssigned($id)
    {
        return $this->model->where('role', 'student')->whereNotIn('id', $id)->get();
    }
}
