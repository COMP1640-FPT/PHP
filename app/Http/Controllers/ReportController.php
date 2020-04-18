<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\StudentTutor;
use App\Repositories\Request\RequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;

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
        $students = [];
        $studentId = StudentTutor::pluck('student_id');
        $studentsWithoutTutor = $this->userRepository->getStudentsNotAssigned($studentId);
        foreach ($studentsWithoutTutor as $key => $studentWithoutTutor) {
            $students[$key] = [
                'name' => $studentWithoutTutor->name,
                'code' => $studentWithoutTutor->code,
            ];
        }

        return $students;
    }

    public function studentsWithNoInteraction($day)
    {
        $lastDay = Carbon::today()->subDays($day);
        $noInteractStudents = [];
        $students = $this->userRepository->getUserByRole('student');
        foreach ($students as $key => $student) {
            $messages = Message::where('sender_id', $student->id)->where('created_at', '>=', $lastDay)->get();
            $requests = $this->requestRepository->getStudentsHaveMeeting($student->id, $lastDay);
            if (count($messages) == 0 && count($requests) == 0) {
                $noInteractStudents[$key] = [
                    'name' => $student->name,
                    'code' => $student->code,
                ];
            }
        }

        return $noInteractStudents;
    }
}
