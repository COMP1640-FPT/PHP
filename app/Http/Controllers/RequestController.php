<?php

namespace App\Http\Controllers;

use App\Repositories\Request\RequestRepositoryInterface;
use Faker\Factory;
use Illuminate\Http\Request;
use App\Models\User;

class RequestController extends Controller
{
    protected $requestRepository;

    public function __construct(RequestRepositoryInterface $requestRepository)
    {
        $this->requestRepository = $requestRepository;
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
            $user = User::find($id);
            if ($user->role === 'student') {
                foreach ($user->rTutors as $key => $tutor) {
                    $requests[$key] = $tutor->pivot;
                }

                return response()->json([
                    'results' => $requests,
                    'success' => true,
                    'message' => 'Get Request successfully',
                ]);
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
                    'message' => 'This User is not Student',
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
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => $ex,
            ]);
        }
    }

    public function getRequestsByStatus($id, Request $request)
    {
        try {
            $data = $this->requestRepository->find($id);
            if ($data->status == $request->newStatus) {
                return response()->json([
                    'results' => $data,
                    'success' => true,
                    'message' => 'Get Request successfully',
                ]);
            } else {
                return response()->json([
                    'results' => null,
                    'success' => true,
                    'message' => 'Status is not corect',
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
