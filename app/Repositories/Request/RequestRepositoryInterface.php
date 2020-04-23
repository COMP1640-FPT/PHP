<?php
namespace App\Repositories\Request;

interface RequestRepositoryInterface
{
    public function getModel();
    public function getRequestsByStatus($status);
    public function getStudentsHaveMeeting($student, $lastDay);
    public function getRequestsByStatusPerDay($status, $date, $user = null, $row = null);
}
