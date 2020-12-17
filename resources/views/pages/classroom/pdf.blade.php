<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
        table, th, td {
          border: 1px solid black;
        }
        table.center {
          margin-left: auto;
          margin-right: auto;
        }
        
        </style>
    </head>

<body>
            <h1 align="center">Staf Admin Sekolah</h1>
            <h3 align="center">Nama: {{  Auth::guard('web')->user()->name }}</h3>
              <p align="center">Email: {{  Auth::guard('web')->user()->email }}</p>

              <hr>

            <h3 align="center">Cetak Data Kelas, Guru, dan Siswa</h3>

    <table class="center">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Nama Kelas</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($classrooms as $data)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $data->teacher->name }}</td>
                <td align="center">{{ $data->teacher->subject }}</td>
                <td align="center">{{ $data->student->name }}</td>
                <td align="center">{{ $data->classroom }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      
</body>

</html>
