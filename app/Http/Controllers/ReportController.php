<?php

namespace App\Http\Controllers;

use App\Models\StudentTutor;
use App\Repositories\Request\RequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class ReportController extends Controller
{
    protected $userRepository;
    protected $requestRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RequestRepositoryInterface $requestRepository
    ) {
        $this->userRepository = $userRepository;
        $this->requestRepository = $requestRepository;
    }

    public function createReport()
    {
        try {
            $report = [
                'numberOfMessages7Days' => $this->numberOfMessagesIn7Days(),
                'averageNumberOfMessage' => $this->averageNumberOfMessage(),
                'studentWithoutTutor' => $this->studentWithoutPersonalTutor(),
                'studentNoInteract7Day' => $this->studentsWithNoInteraction(7),
                'studentNoInteract28Day' => $this->studentsWithNoInteraction(28),
            ];

            return response()->json([
                'results' => $report,
                'success' => true,
                'message' => 'Create report successfully',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => $ex,
            ]);
        }
    }

    public function numberOfMessagesIn7Days()
    {
    }

    public function averageNumberOfMessage()
    {
        $requests = [];
        $numberOfMessage = 0;
        $tutorsId = $this->userRepository->getUserByRole('tutor')->pluck('id');
        foreach ($tutorsId as $key => $tutorId) {
            $requests[$key] = $this->requestRepository->getRequestsByTutor($tutorId);
            foreach ($requests[$key] as $rq) {
                $numberOfMessage += count($rq->messages);
            }
        }
        return $numberOfMessage / count($tutorsId);
    }

    public function studentWithoutPersonalTutor()
    {
        $studentId = StudentTutor::pluck('student_id');

        return $this->userRepository->getStudentsNotAssigned($studentId)->pluck('name', 'code');
    }

    public function studentsWithNoInteraction($day)
    {
    }
}
