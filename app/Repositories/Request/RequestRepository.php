<?php
namespace App\Repositories\Request;

use App\Repositories\EloquentRepository;
use App\Models\Request;

class RequestRepository extends EloquentRepository implements RequestRepositoryInterface
{

    public function getModel()
    {
        return Request::class;
    }

    public function getRequestsByStatus($status)
    {
        return $this->model->where('status', $status)->orderBy('id', 'DESC')->get();
    }

    public function getRequestsByStudent($student)
    {
        return $this->model->where('student_id', $student)->orderBy('id', 'DESC')->get();
    }
}
