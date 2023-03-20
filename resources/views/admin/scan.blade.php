@extends('layouts.master')

@section('content')

    </style>
    <center>
        <div id="reader" class="col-8" ></div>
    </center>

    <div class="justfy-content-center align-items-center text-center">
        <div class="spinner-border text-primary" id="loading" hidden style="width: 100px; height:100px;">
        </div>
    </div>

    <input type="hidden" name="result" id="result">`
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // alert(decodedText);
            $('#result').val(decodedText);
            let id = decodedText;
            var url = "{{ route('admin.preview', ':id') }}";
            url = url.replace(':id', id);
            console.log(id);

            var loading = document.getElementById('loading')
            loading.removeAttribute('hidden')
            
            html5QrcodeScanner.clear().then(_ => {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        _methode: "GET",
                        qr_code: id
                    },
                    success: function(data) {
                        console.log('sukses')
                        window.location.href = url
                        e.preventDefault();
                    },
                    error: function(err) {
                        console.log(err)
                        Swal.fire({
                            icon: 'error',
                            text: 'BARCODE SALAH',
                            title: 'Error',
                            timer: 1500
                        })
                        setTimeout(redirect_back, 1500);

                        function redirect_back() {
                            window.location.href = '/scan'
                        }
                    }
                });
            }).catch(error => {
                alert('something wrong');
            });
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
