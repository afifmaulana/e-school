@extends('welcome')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Ubah Data Guru</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Data Guru</a>
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
                            <h2>Ubah Data Guru</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('teacher.update', $data->id) }}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group form-float">
                                    <label class="form-label">Nama Lengkap Guru</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                               name="name" required placeholder="Masukkan Nama Guru"
                                               value="{{$data->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Mata Pelajaran</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('subject')?'is-invalid':''}}"
                                               name="subject" required placeholder="Masukkan Mata Pelajaran"
                                               value="{{$data->subject}}">
                                        @if ($errors->has('subject'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('subject') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">NIP</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('nip')?'is-invalid':''}}"
                                               name="nip" required placeholder="Masukkan NIP"
                                               value="{{$data->nip}}">
                                        @if ($errors->has('nip'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nip') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
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