@extends('layouts.master')

@section('content')
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
    @endif

    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
    @endif

    <form method="post" action={{ route('admin.import.siswa') }} enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
            </div>
            <div class="modal-body">

                {{ csrf_field() }}

                <label>Pilih file excel</label>
                <div class="form-group">
                    <input type="file" name="file" required="required">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </form>


    <a href="{{ route('admin.create.siswa') }}" class="btn btn-primary">+ Tambah Siswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                {{-- <th>Barcode</th> --}}
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td> {{ $siswa->barcode }}</td> --}}
                    {{-- <td> <img style="background-color: white;padding: 20px;" src="{{ '/storage/' . $siswa->foto_barcode }}"
                            alt="">
                    </td> --}}
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
