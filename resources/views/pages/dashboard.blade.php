@extends('welcome')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Dashboard</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Data Guru</div>
                    <h3 class="m-b-10">{{count(\App\Teacher::where('user_id', Auth::user()->id)->get())}}
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Data Siswa</div>
                    <h3 class="m-b-10">{{count(\App\Student::where('user_id', Auth::user()->id)->get())}}
                    </h3>

                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Data Kelas</div>
                    <h3 class="m-b-10">{{count(\App\Classroom::where('user_id', Auth::user()->id)->get())}}
                    </h3>

                </div>
            </div>
        </div>
    </div>
    </section>
    
@endsection