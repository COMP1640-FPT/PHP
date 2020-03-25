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
                'message' => 'Return majors successfully!',
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
        $major = Major::find($id);

        if (is_null($major)) {
            return response()->json(["message" => "Not found"], 404);            
        }
        return response()->json($major, 200);
    }

    public function edit($id)
    {
        // try {
        //     $major = $this->majorRepository->find($id);

        //     return response()->json([
        //         'results' => $major,
        //         'success' => true,
        //         'message' => 'Return major successfully!',
        //     ]);
        // } catch (\Exception $ex) {
        //     report($ex);

        //     return $ex;
        // }
    }


    public function update(Request $request, $id)
    {

        // try {
        //     $data = $request->all();

        //     $major = $this->majorRepository->update($data, $id);

        //     return response()->json([
        //         'result' => $major,
        //         'success' => true,
        //         'message' => 'Update major successfully',
        //     ]);
        // } catch (\Exception $ex) {
        //     report($ex);

        //     return response()->json([
        //         'results' => null,
        //         'success' => false,
        //         'message' => $ex,
        //     ]);
        // }
    }

    public function destroy($id)
    {

            $major = Major::find($id);

            if (is_null($major)) {
                 return response()->json(["message" => "Not found"], 404);
            }

            else{
                $major->delete();
                return response()->json("delete successfully !!!");
            }
            

    }
}
