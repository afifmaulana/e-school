<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
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
        $datas = Teacher::where('user_id', $user->id)->get();
        return view('pages.teachers.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teachers.create');
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
            'subject' => 'required',
            'nip' => 'required',
         ];
 
         $message = [
             'required'  => ':tidak boleh kosong',
         ];
 
         $this->validate($request, $rules, $message);
 
         $data = new Teacher();
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->subject = $request->subject;
         $data->nip = $request->nip;
         $data->save();
 
         return redirect()->route('teacher.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Teacher::find($id);
        return view('pages.teachers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'name' => 'required',
            'subject' => 'required',
            'nip' => 'required',
         ];
 
         $message = [
             'required'  => ':tidak boleh kosong',
         ];
 
         $this->validate($request, $rules, $message);
        $data = Teacher::find($id);
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->subject = $request->subject;
        $data->nip = $request->nip;
        $data->update();

        return redirect()->route('teacher.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::find($id);
        $data->delete();
        return redirect()->route('teacher.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
