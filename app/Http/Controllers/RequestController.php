<?php

namespace App\Http\Controllers;

use App\Repositories\Request\RequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class RequestController extends Controller
{
    protected $requestRepository;
    protected $userRepository;

    public function __construct(
        RequestRepositoryInterface $requestRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->requestRepository = $requestRepository;
        $this->userRepository = $userRepository;
    }

    public function createRequest(Request $request)
    {
        try {
            $data = [
                'student_id' => $request->student_id,
                'tutor_id' => $request->tutor_id,
                'type' => $request->type,
                'title' => $request->title,
                'description' => $request->description,
                'room' => md5(rand()),
            ];
            $request = $this->requestRepository->create($data);

            return response()->json([
                'results' => $request,
                'success' => true,
                'message' => 'Created Request successfully',
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

    public function getRequestsByStudent($id)
    {
        try {
            $requests = [];
            $user = $this->userRepository->find($id);
            if ($user) {
                if ($user->role === 'student') {
                    if (count($user->rTutors) > 0) {
                        foreach ($user->rTutors as $key => $tutor) {
                            $requests[$key] = $tutor->pivot;
                        }

                        return response()->json([
                            'results' => $requests,
                            'success' => true,
                            'message' => 'Get Request successfully!',
                        ]);
                    } else {
                        return response()->json([
                            'results' => null,
                            'success' => true,
                            'message' => 'This Student has not any Requests!',
                        ]);
                    }
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => true,
                        'message' => 'This User is not Student!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
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

    public function changeRequestStatus($id)
    {
        try {
            $request = $this->requestRepository->find($id);
            if ($request) {
                if ($request->status === 'Not Resolve') {
                    $request->status = 'Resolved';
                    $request->save();

                    return response()->json([
                        'results' => $request,
                        'success' => true,
                        'message' => 'Change Status of Request successfully!',
                    ]);
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => true,
                        'message' => 'Can not change status of this Request!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
                    'message' => 'This Request not exist!',
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

    public function getRequestById($id)
    {
        try {
            $request = $this->requestRepository->find($id);
            if ($request) {
                return response()->json([
                    'results' => $request,
                    'success' => true,
                    'message' => 'Get Request successfully!',
                ]);
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
                    'message' => 'This request not exist!',
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

    public function getRequestsByTutor($id)
    {
        try {
            $requests = [];
            $user = $this->userRepository->find($id);
            if ($user) {
                if ($user->role === 'tutor') {
                    if (count($user->rStudents) > 0) {
                        foreach ($user->rStudents as $key => $student) {
                            $requests[$key] = $student->pivot;
                        }

                        return response()->json([
                            'results' => $requests,
                            'success' => true,
                            'message' => 'Get Requests successfully!',
                        ]);
                    } else {
                        return response()->json([
                            'results' => null,
                            'success' => true,
                            'message' => 'This Tutor has not any requests!',
                        ]);
                    }
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => true,
                        'message' => 'This User is not Tutor!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
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
}
