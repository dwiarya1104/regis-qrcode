@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card col-12">
            <div class="card-header" style="padding-bottom: 0px">
                <h3>
                    Konfirmasi Pengunjung
                </h3>
                <hr>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><p style="font-size: 1.1rem">NIS</p></td>
                            <td><p style="font-size: 1.1rem">{{ $preview->nis }}</p></td>
                        </tr>
                        <tr>
                            <td><p style="font-size: 1.1rem">Nama</p></td>
                            <td><p style="font-size: 1.1rem">{{ $preview->nama }}</p></td>
                        </tr>
                        <tr>
                            <td><p style="font-size: 1.1rem">Kelas</p></td>
                            <td><p style="font-size: 1.1rem">{{ $preview->kelas }}</p></td>
                        </tr>
                        <tr>
                            <td><p style="font-size: 1.1rem">Pendamping</p></td>
                            <td><p style="font-size: 1.1rem">{{ $preview->pendamping }}</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <form action="{{ route('admin.submit-preview') }}" method="POST" style="display: inline-block">
                            @csrf
                            <input type="hidden" value="{{ $preview->id }}" name="siswa_id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
