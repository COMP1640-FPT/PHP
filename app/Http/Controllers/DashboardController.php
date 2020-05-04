<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\Message;
use App\Models\Request;
use App\Repositories\Request\RequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
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

    public function studentDashboard($id)
    {
        try {
            $user = $this->userRepository->find($id);
            if ($user) {
                if ($user->role === 'student') {
                    $studentDashboard = [
                        'totalRequests' => $this->requestRepository->getRequestsByStudent($id)->count(),
                        'resolvedRequests' => $this->requestRepository->getRequestsByStudent($id)
                            ->where('status', 'Resolved')->count(),
                        'averageMessages' => $this->getMessagesByRequest($this->requestRepository
                            ->getRequestsByStudent($id)->pluck('id')),
                        'resolvedRequestsPerDay' => $this->getRequestsPerDay('Resolved', $id, 'student'),
                        'processingRequestsPerDay' => $this->getRequestsPerDay('Not Resolve', $id, 'student'),
                    ];

                    return response()->json([
                        'results' => $studentDashboard,
                        'success' => true,
                        'message' => 'Return successfully!',
                    ]);
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => false,
                        'message' => 'This User is not Student!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
                    'message' => 'This User not exist!',
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

    public function tutorDashboard($id)
    {
        try {
            $user = $this->userRepository->find($id);
            if ($user) {
                if ($user->role === 'tutor') {
                    $studentDashboard = [
                        'totalRequests' => $this->requestRepository->getRequestsByTutor($id)->count(),
                        'resolvedRequests' => $this->requestRepository->getRequestsByTutor($id)
                            ->where('status', 'Resolved')->count(),
                        'averageMessages' => $this->getMessagesByRequest($this->requestRepository
                            ->getRequestsByTutor($id)->pluck('id')),
                        'resolvedRequestsPerDay' => $this->getRequestsPerDay('Resolved', $id, 'tutor'),
                        'processingRequestsPerDay' => $this->getRequestsPerDay('Not Resolve', $id, 'tutor'),
                    ];

                    return response()->json([
                        'results' => $studentDashboard,
                        'success' => true,
                        'message' => 'Return successfully!',
                    ]);
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => false,
                        'message' => 'This User is not Student!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
                    'message' => 'This User not exist!',
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

    public function staffDashboard()
    {
        try {
            $staffDashboard = [
                'totalRequests' => $this->requestRepository->getAll()->count(),
                'resolvedRequests' => $this->requestRepository->getRequestsByStatus('Resolved')->count(),
                'averageMessages' => $this->getMessagesByRequest($this->requestRepository
                    ->getAll()->pluck('id')),
                'resolvedRequestsPerDay' => $this->getRequestsPerDay('Resolved'),
                'processingRequestsPerDay' => $this->getRequestsPerDay('Not Resolve'),
                'tutorRanking' => $this->getTutorRanking(),
            ];
            dd($staffDashboard);

            return response()->json([
                'results' => $staffDashboard,
                'success' => true,
                'message' => 'Return successfully!',
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

    public function getMessagesByRequest($id)
    {
        $messages = Message::whereIn('request_id', $id)->get()->count();
        return count($id) == 0 ? 0 : round($messages / count($id), 2, PHP_ROUND_HALF_EVEN);
    }

    public function getRequestsPerDay($status, $userId = null, $role = null)
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6);
        $dates = DateHelper::getDateInRange($startDate, $endDate);
        $requests = [];
        if ($role == 'student') {
            foreach ($dates as $date) {
                $requests[$date] = $this->requestRepository
                    ->getRequestsByStatusPerDay($status, $date, $userId, 'student_id');
            }
        } elseif ($role == 'tutor') {
            foreach ($dates as $date) {
                $requests[$date] = $this->requestRepository
                    ->getRequestsByStatusPerDay($status, $date, $userId, 'tutor_id');
            }
        } else {
            foreach ($dates as $date) {
                $requests[$date] = $this->requestRepository->getRequestsByStatusPerDay($status, $date);
            }
        }

        return $requests;
    }

    public function getTutorRanking()
    {
        $rates = [];
        $tutors = $this->userRepository->getUserByRole('tutor');
        foreach ($tutors as $key => $tutor) {
            $point = 0;
            $requests = $this->requestRepository
                ->getRequestsByTutor($tutor->id)->pluck('rates')->toArray();
            foreach ($requests as $request) {
                $point += $request;
            }
            $rates[$key] = [
                'rates' => round($point / count($requests), 2, PHP_ROUND_HALF_EVEN),
                'tutor_id' => $tutor->id,
                'tutor' => $tutor->name,
                'numberOfStudent' => count($tutor->students),
            ];
        }
        arsort($rates);

        return $rates;
    }
}
