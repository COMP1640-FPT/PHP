<?php

namespace App\Http\Controllers;

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
            $tutor = $this->userRepository->find($request->tutor);

            $sync = $tutor->students()->sync($request->student);

            return response()->json([
                'results' => $tutor->students,
                'success' => true,
                'message' => 'Change status successfully',
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
