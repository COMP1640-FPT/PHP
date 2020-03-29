<?php

namespace App\Http\Controllers;

use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        try {
            $subjects = $this->subjectRepository->getAll();

            return response()->json([
                'results' => $subjects,
                'success' => true,
                'message' => 'Get all Subjects successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => 'Cannot get all Subjects',
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $subject = $this->subjectRepository->create($request->all());

            return response()->json([
                'results' => $subject,
                'success' => true,
                'message' => 'Add Subject successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => 'Cannot add Subject',
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $subject = $this->subjectRepository->find($id);

            return response()->json([
                'results' => $subject,
                'success' => true,
                'message' => 'Find Subject successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => 'No match found!',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $subject = $this->subjectRepository->update($id, $request->all());

            return response()->json([
                'results' => $subject,
                'success' => true,
                'message' => 'Update Subject successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => 'Cannot update Subject',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $subject = $this->subjectRepository->delete($id);

            return response()->json([
                'results' => $subject,
                'success' => true,
                'message' => 'Delete Subject successfully!',
            ]);
        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                'results' => null,
                'success' => false,
                'message' => 'Cannot delete Subject',
            ]);
        }
    }
}
