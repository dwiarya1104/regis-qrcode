@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card shadow-sm">
            <div class="card-header" style="padding-bottom: 0px">
                <h3>
                    Siswa
                </h3>
                <hr>
                @include('message')
                {{-- <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate('Make me into an QrCode!')) }} "> --}}
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6 d-flex justify-content-start">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import Excel
                        </button>

                    </div>
                    {{-- <div class="col-6 d-flex justify-content-end">
                        <a href="{{ route('admin.create.siswa') }}" class="btn btn-primary">+ Tambah Siswa</a>
                    </div> --}}
                </div>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nis</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendamping</th>
                            <th style="text-align:center">Tiket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                                <td>{{ $siswa->pendamping }}</td>
                                <td style="text-align:center"><a href="{{'/storage/'. $siswa->tiket }}" target="_blank" style="color: black"><i class="bi bi-download" style="font-size: 1.2rem"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action={{ route('admin.import.siswa') }} enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Input Excel</label>
                            <input type="file" name="file" required="required" class="form-control">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
