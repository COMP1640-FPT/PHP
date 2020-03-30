<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Http\Controllers\Controller;
use App\Repositories\Major\MajorRepositoryInterface;

class MajorController extends Controller
{
    protected $majorRepository;

    public function __construct(MajorRepositoryInterface $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function index()
    {
        try {
            $majors = $this->majorRepository->getAll();

            return response()->json([
                'results' => $majors,
                'success' => true,
                'message' => 'Show majors successfully!',
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
            $data = $request->all();
            $major = $this->majorRepository->create($data);

            return response()->json([
                'result' => $major,
                'success' => true,
                'message' => 'Created major successfully',
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

    public function show($id)
    {
        try {
            $major = Major::find($id);

            return response()->json([
                'result' => $major,
                'success' => true,
                'message' => 'Successfully',
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
   
    public function update(Request $request, $id)
    {
        try {
            $major = $this->majorRepository->update($id, $request->all());
            
            return response()->json([
                'result' => $major,
                'success' => true,
                'message' => 'Update major successfully',
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
            $major = $this->majorRepository->delete($id);

            return response()->json([
                'results' => $major,
                'success' => true,
                'message' => 'Delete major successfully!',
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
