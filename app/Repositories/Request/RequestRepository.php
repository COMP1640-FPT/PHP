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

    public function getRequestsByTutor($tutor)
    {
        return $this->model->where('tutor_id', $tutor)->orderBy('id', 'DESC')->get();
    }

    public function getStudentsHaveMeeting($student, $lastDay)
    {
        return $this->model->where('type', 'meeting')->where('student_id', $student)
            ->where('updated_at', '>=', $lastDay)->get();
    }
}
