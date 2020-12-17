<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = Auth::user();
        $datas = Classroom::where('user_id', $user->id)->get();
        return view('pages.classroom.index', compact('datas'));
    }


    public function exportpdf()
    {
        $user = Auth::user();
        $classrooms = Classroom::where('user_id', $user->id)->get();
        $pdf = PDF::loadView('pages.classroom.pdf', compact('classrooms'));
        return $pdf->stream('classroom.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::where('user_id', Auth::user()->id)->get();
        $students= Student::where('user_id', Auth::user()->id)->get();
        return view('pages.classroom.create', compact('teachers','students'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'classroom' => 'required',
            'teacher_id' => 'required',
            'student_id' => 'required|unique:classrooms',
            
         ];
 
         $message = [
             'required'  => ':attribute tidak boleh kosong',
             'unique' => 'Siswa hanya boleh memiliki satu kelas',
         ];
 
         $this->validate($request, $rules, $message);

        $data = new Classroom();
        $data->user_id = Auth::user()->id;
        $data->classroom = $request->classroom;
        $data->teacher_id = $request->teacher_id;
        $data->student_id = $request->student_id;
        $data->save();

        return redirect()->route('classroom.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Classroom::find($id);
        $datateacher = Teacher::where('user_id', Auth::user()->id)->get();
        $datastudent = Student::where('user_id', Auth::user()->id)->get();
        return view('pages.classroom.edit', compact('data', 'datateacher', 'datastudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'classroom' => 'required',
            'teacher_id' => 'required',
            'student_id' => 'required|unique:classrooms',
            
         ];
 
         $message = [
             'required'  => ':attribute tidak boleh kosong',
             'unique' => 'Siswa hanya boleh memiliki satu kelas',
         ];
 
         $this->validate($request, $rules, $message);
        $data = Classroom::find($id);
        $data->user_id = Auth::user()->id;
        $data->classroom = $request->classroom;
        $data->teacher_id = $request->teacher_id;
        $data->student_id = $request->student_id;
        $data->update();

        return redirect()->route('classroom.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Classroom::find($id);
        $data->delete();
        return redirect()->route('classroom.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
