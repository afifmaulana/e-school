<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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
        $datas = Student::where('user_id', $user->id)->get();
        return view('pages.students.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.create');
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
            'name' => 'required',
            'address' => 'required',
         ];
 
         $message = [
             'required'  => ':tidak boleh kosong',
         ];
 
         $this->validate($request, $rules, $message);
 
         $data = new Student();
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->address = $request->address;
         $data->save();
 
         return redirect()->route('student.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return view('pages.students.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'name' => 'required',
            'address' => 'required',
         ];
 
         $message = [
             'required'  => ':tidak boleh kosong',
         ];
 
         $this->validate($request, $rules, $message);
         
         $data = Student::find($id);
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->address = $request->address;
         $data->update();
 
         return redirect()->route('student.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('student.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
