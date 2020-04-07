<?php

namespace App\Http\Controllers;

use App\Repositories\Major\MajorRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $majorRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        MajorRepositoryInterface $majorRepository
    ) {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->userRepository = $userRepository;
        $this->majorRepository = $majorRepository;
    }

    public function index()
    {
        try {
            $users = $this->userRepository->getAll();

            return response()->json([
                'results' => $users,
                'success' => true,
                'message' => 'Return users successfully!',
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

    public function store(Request $request)
    {
        try {
            $handleUser = $this->handleRequest($request);
            $user = $this->userRepository->create($handleUser);

            return response()->json([
                'result' => $user,
                'success' => true,
                'message' => 'Created user successfully',
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

    public function edit($id)
    {
        try {
            $user = $this->userRepository->find($id);

            return response()->json([
                'results' => $user,
                'success' => true,
                'message' => 'Return user successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return $ex;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $handleUser = $this->handleRequest($request);
            $user = $this->userRepository->update($id, $handleUser);

            return response()->json([
                'results' => $user,
                'success' => true,
                'message' => 'Update user successfully!',
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

    public function destroy($id)
    {
        try {
            $user = $this->userRepository->delete($id);

            return response()->json([
                'results' => $user,
                'success' => true,
                'message' => 'Delete user successfully!',
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

    public function handleRequest($request)
    {
        $firstName = explode(' ', $request->firstName);
        $header = $request->lastName;
        foreach ($firstName as $word) {
            $header .= substr($word, 0, 1);
        }
        $code = $request->preCode . $request->code;

        return [
            'name' => $request->lastName . ' ' . $request->firstName,
            'code' => $code,
            'role' => $request->role,
            'country' => $request->country,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'email' => $header . $code . '@etutor.com',
            'avatar' => $request->avatar,
        ];
    }

    public function handleRoleChange($role)
    {
        try {
            $results = [];
            switch ($role) {
                case 'student':
                    $results['preCode'] = $this->majorRepository->getMajorCode()->toArray();
                    $matches = preg_replace('/[^0-9]/', '', $this->userRepository->getUserByRole($role)->first()->code);
                    $results['code'] = ($matches + 1);
                    break;
                case 'tutor':
                    $results['preCode'] = ['TUT'];
                    $matches = preg_replace('/[^0-9]/', '', $this->userRepository->getUserByRole($role)->first()->code);
                    $results['code'] = ($matches + 1);
                    break;
                case 'staff':
                    $results['preCode'] = ['STF'];
                    $matches = preg_replace('/[^0-9]/', '', $this->userRepository->getUserByRole($role)->first()->code);
                    $results['code'] = ($matches + 1);
                    break;
            }
            return response()->json([
                'results' => $results,
                'success' => true,
                'message' => 'Return code successfully',
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

    public function getTutors()
    {
        try {
            $users = $this->userRepository->getUserByRole('tutor');

            return response()->json([
                'results' => $users,
                'success' => true,
                'message' => 'Return code successfully',
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

    public function guard()
    {
        return Auth::guard();
    }
}
