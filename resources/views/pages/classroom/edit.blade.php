@extends('welcome')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Ubah Data Kelas</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Data Kelas</a>
                            </li>
                            <li class="breadcrumb-item active">Ubah</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Ubah Data Kelas</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('classroom.update', $data->id) }}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group form-float">
                                    <label class="form-label"> Kelas</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('classroom')?'is-invalid':''}}"
                                               name="classroom" required placeholder="Masukkan Nama Kelas"
                                               value="{{$data->classroom}}">
                                        @if ($errors->has('classroom'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('classroom') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Guru</label>
                                    <select class="form-control {{$errors->has('teacher_id')?'is-invalid':''}}" 
                                        name="teacher_id" value="{{old('teacher_id')}}">
                                        @foreach($datateacher as $teacher)
                                        <option value="{{$teacher->id}}" {{$data->teacher_id === $teacher->id ? 'selected' : ''}}>
                                            {{$teacher->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('teacher_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('teacher_id') }}</b></p>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Pilih Guru</label>
                                    <select class="form-control {{$errors->has('student_id')?'is-invalid':''}}" 
                                        name="student_id" value="{{old('student_id')}}">
                                        @foreach($datastudent as $student)
                                        <option value="{{$student->id}}" {{$data->student_id === $student->id ? 'selected' : ''}}>
                                            {{$student->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('student_id'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('student_id') }}</b></p>
                                                    </span>
                                        @endif
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection