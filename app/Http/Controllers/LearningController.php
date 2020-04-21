<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailAssignStudent;
use App\Jobs\SendEmailAssignTutor;
use App\Models\StudentTutor;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function assignStudentsForTutor(Request $request)
    {
        try {
            $attStudents = [];
            $detStudents = [];
            $tutor = $this->userRepository->find($request->tutor);
            $sync = $tutor->students()->sync($request->student);
            if ($sync['attached']) {
                $attStudents = $this->userRepository->findStudentsById($sync['attached']);
                $message = [
                    'action' => 'allocated',
                    'tutor' => $tutor->name,
                ];
                SendEmailAssignTutor::dispatch($message, $attStudents)->delay(now()->addMinute(1));
            }
            if ($sync['detached']) {
                $detStudents = $this->userRepository->findStudentsById($sync['detached']);
                $message = [
                    'action' => 'unallocated',
                    'tutor' => $tutor->name,
                ];
                SendEmailAssignTutor::dispatch($message, $detStudents)->delay(now()->addMinute(1));
            }
            if ($sync['attached'] || $sync['detached']) {
                SendEmailAssignStudent::dispatch($attStudents, $detStudents, $tutor);
            }
            return response()->json([
                'results' => $tutor->students,
                'success' => true,
                'message' => 'Assigned Students for tutor successfully',
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

    public function getStudentsByTutor($id)
    {
        try {
            $tutor = $this->userRepository->getStudentByTutor($id);
            if ($tutor->role === 'tutor') {
                $students = $tutor->students;

                return response()->json([
                    'results' => $students,
                    'success' => true,
                    'message' => 'Get Students successfully',
                ]);
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
                    'message' => 'This User is not Tutor',
                ]);
            }
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => $ex,
            ]);
        }
    }

    public function getTutorByStudent($id)
    {
        try {
            $students = $this->userRepository->getTutorByStudent($id);
            if ($students->role === 'student') {
                $tutor = $students->tutors[0];

                return response()->json([
                    'results' => $tutor,
                    'success' => true,
                    'message' => 'Get Tutor successfully',
                ]);
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
                    'message' => 'This User is not Tutor',
                ]);
            }
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => $ex,
            ]);
        }
    }

    public function getStudentsNotAssigned()
    {
        try {
            $studentId = StudentTutor::pluck('student_id');
            $students = $this->userRepository->getStudentsNotAssigned($studentId);

            return response()->json([
                'results' => $students,
                'success' => true,
                'message' => 'Get all Students not assigned successfully!',
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
}
