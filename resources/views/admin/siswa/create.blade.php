@extends('layouts.master')

@section('content')
    <h3>Tambah Siswa</h3>
    <div id="myform" class="section">
        <div class="card mb-3">
            <div class="card-body">
                <form id="form">
                    @csrf
                    <div class="mb-3 nama">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="">Kelas</label>
                        <select name="kelas_id" class="form-select" required>
                            <option value="" hidden selected>-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Pendamping</label>
                        <textarea name="pendamping" id="pendamping" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="another-form">

    </div>
    <button id="button" class="btn btn-primary">Tambah Siswa</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let myForm = document.getElementById('myform')
        let button = document.querySelector('#button')

        button.addEventListener('click', (e) => {
            // let clone = myForm.cloneNode(true);
            // myForm.appendChild(clone);

            let token = $('input[name="_token"]').val();
            let nama = $('input[name="nama"]:last').val();
            let kelas = $('select[name=kelas_id] option').filter(':selected:last').val();
            let pendamping = $('textarea#pendamping:last').val();

            $.ajax({
                url: "{{ route('admin.store.siswa') }}",
                type: 'POST',
                data: {
                    _methode: "POST",
                    _token: token,
                    nama: nama,
                    kelas_id: kelas,
                    pendamping: pendamping
                },
                success: function(res) {
                    $("#myform").clone().appendTo(".another-form").find(
                            "textarea#pendamping,input[name='nama']")
                        .val("").last().attr('id');
                    return false;
                },
                error: function(err) {
                    console.log(err.responseJSON.message)
                }
            });
        })
    </script>
@endsection
