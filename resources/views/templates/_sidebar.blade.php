<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="sidebar-user-panel active">
                <div class="user-panel">
                    <div class=" image">
                        <img src="{{ asset('assets/images/user/user3.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                    </div>
                </div>
                <div class="profile-usertitle">
                    <div class="sidebar-userpic-name"> {{ Auth::user()->name }} </div>
                    <div class="profile-usertitle-job ">Staff Admin Sekolah </div>
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('teacher.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Teachers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('student.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Students</span>
                </a>
            </li>
            <li>
                <a href="{{ route('classroom.index') }}">
                    <i class="fa fa-school"></i>
                    <span>Classroom</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
