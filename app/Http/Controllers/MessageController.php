<?php

namespace App\Http\Controllers;

use App\Repositories\Request\RequestRepositoryInterface;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $requestRepository;

    public function __construct(RequestRepositoryInterface $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    public function storeMessage(Request $rq)
    {
        try {
            $request = $this->requestRepository->find($rq->request_id);
            if ($request) {
                $studentId = $request->student_id;
                $tutorId = $request->tutor_id;
                if ($rq->sender_id == $studentId || $rq->sender_id == $tutorId) {
                    $request->senders()->attach($rq->sender_id, [
                        'content' => $rq->content,
                        'file' => $rq->file,
                    ]);
                    $lastMessage = $request->senders[count($request->senders) - 1];
                    return response()->json([
                        'results' => $lastMessage,
                        'success' => true,
                        'message' => 'Store message successfully!',
                    ]);
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => true,
                        'message' => 'Sender not authorized in this request!',
                    ]);
                }
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
}
