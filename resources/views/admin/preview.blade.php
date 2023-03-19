@extends('layouts.master')
@section('content')
    <center>
        <div class="card w-50">
            <div class="card-body">
                <p>
                    Nama : {{ $preview->nama }}
                </p>
                <p>
                    Kelas : {{ $preview->kelas->kelas }}
                </p>
                <p>
                    Pendamping : {{ $preview->pendamping }}
                </p>
            </div>
        </div>
        <form action="{{ route('admin.submit-preview') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $preview->id }}" name="siswa_id">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
    </center>
@endsection
