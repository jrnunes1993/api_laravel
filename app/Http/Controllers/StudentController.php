<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\Student as StudentResource;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Student::get()->makeHidden('classroom_id'),200)->header('Content-Type', 'application/json ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        
        
        try {
            return Student::create($request->all());
        }catch (\Throwable $e){
            return response()->json(["message" => $e->getMessage()],500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {       
            return new StudentResource ($student);
    //     $student = Student::find($id);
    //     if($student) {
    //         return response()->json($student,302);
    //     }

    //     return response()->json([
    //         "errors" => [
    //         [
    //             "code" => "1",
    //             "message"=>"Não existe estudante para esse ID."
    //         ]
    //     ]
    // ],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student){
            return response()->json(["message"=>"Não encontrado."],404);
        }
        try{
            $student->update($request->all());
            return [];
        }catch (\Throwable $e) {
            return response()->json(["message", $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if(!$student){
            return response()->json(["message"=>"Não encontrado."],404);
        }
        try {
            $student->delete();
            return [];
        }catch (\Throwable $e){
            return response()->json(["message",$e->getMessage()],404);
        }
    }
}
