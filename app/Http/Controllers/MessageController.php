<?php

namespace App\Http\Controllers;

use App\Repositories\Request\RequestRepositoryInterface;
use Carbon\Carbon;
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
                        'created_at' => Carbon::now(),
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
                        'success' => false,
                        'message' => 'Sender not authorized in this request!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
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

    public function getMessagesByRequest($id)
    {
        try {
            $messages = [];
            $request = $this->requestRepository->find($id);
            if ($request) {
                if (count($request->senders) > 0) {
                    foreach ($request->senders as $key => $sender) {
                        $dateTime = explode(' ', $sender->pivot->created_at);
                        $messages[$key] = [
                            'sender_name' => $sender->name,
                            'sender_avatar' => $sender->avatar,
                            'sender_id' => $sender->pivot->sender_id,
                            'request_id' => $sender->pivot->request_id,
                            'content' => $sender->pivot->content,
                            'file' => $sender->pivot->file,
                            'date' => $dateTime[0],
                            'time' => $dateTime[1],
                        ];
                    }

                    return response()->json([
                        'results' => $messages,
                        'success' => true,
                        'message' => 'Get messages successfully!',
                    ]);
                } else {
                    return response()->json([
                        'results' => null,
                        'success' => false,
                        'message' => 'Let start!',
                    ]);
                }
            } else {
                return response()->json([
                    'results' => null,
                    'success' => false,
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
