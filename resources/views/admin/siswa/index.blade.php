@extends('layouts.master')

@section('content')
    <a href="{{ route('admin.create.siswa') }}" class="btn btn-primary">+ Tambah Siswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Barcode</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $siswa->barcode }}</td>
                    <td> <img style="background-color: white;padding: 20px;" src="{{ '/storage/' . $siswa->foto_barcode }}"
                            alt="">
                    </td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas->kelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
