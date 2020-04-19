<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
                    $msg = Message::create([
                        'request_id' => $rq->request_id,
                        'sender_id' => $rq->sender_id,
                        'content' => $rq->content,
                        'file' => $rq->file,
                    ]);
                    $message = array_merge($msg->toArray(), [
                        'sender_name' => $msg->sender->name,
                        'sender_avatar' => $msg->sender->avatar,
                    ]);

                    return response()->json([
                        'results' => $message,
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
            $request = $this->requestRepository->find($id);
            if ($request) {
                $messages = Message::where('request_id', $id)->get();
                $msgs = $messages->toArray();
                if (count($messages) > 0) {
                    foreach ($messages as $key => $message) {
                        $dateTime = explode(' ', $message->created_at);
                        $msgs[$key] = array_merge($msgs[$key], [
                            'sender_name' => $message->sender->name,
                            'sender_avatar' => $message->sender->avatar,
                            'date' => $dateTime[0],
                            'time' => $dateTime[1],
                        ]);
                    }

                    return response()->json([
                        'results' => $msgs,
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
