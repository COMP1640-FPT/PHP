<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RequestController extends Controller
{
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
}
