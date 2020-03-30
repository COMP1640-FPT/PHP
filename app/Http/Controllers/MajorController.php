<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Repositories\Major\MajorRepositoryInterface;

class MajorController extends Controller
{
    protected $majorRepository;
    public function __construct(
        MajorRepositoryInterface $majorRepository
    ) {
        $this->majorRepository = $majorRepository;
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
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
        //
    }
}
