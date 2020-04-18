<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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
    }

    public function studentWithoutPersonalTutor()
    {
    }

    public function studentsWithNoInteraction($day)
    {
    }
}
