@extends('layouts.master')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jam Hadir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrasi as $regis)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $regis->siswa->nama }}</td>
                    <td>{{ $regis->siswa->kelas }}</td>
                    <td>{{ $regis->jam_hadir }}</td>
                    <td> <span
                            class="badge bg-{{ $regis->status == 'hadir' ? 'success' : 'danger' }}">{{ $regis->status }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
