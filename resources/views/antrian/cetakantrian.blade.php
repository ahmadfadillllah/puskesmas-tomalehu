@extends('server.master')

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">


                {{ csrf_field() }}
                <div class="modal fade" id="cetakAntrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Mengecek NIK KTP</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3 for="">NIK KTP</h3>
                            <p id="snik_ktp" name="nik_ktp"></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="#" id="submit" class="btn btn-success success">Submit</a>
                        </div>
                      </div>
                    </div>
                  </div>



            <section id="input-sizing">
                <div class="row match-height">
                    @if (session('notification'))
                        <script>
                            Swal.fire({
                                title: 'Information',
                                text: '{{{ session('notification') }}}',
                                icon: 'info',
                                confirmButtonText: 'Ok'
                            })

                        </script>
                        @endif
                        <form action="{{ route('cetakAntrian') }}" method="post" id="formfield">
                            {{ csrf_field() }}
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Cetak Antrian</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="largeInput">NIK KTP</label>
                                                    <input id="bnik_ktp" name="nik_ktp" class="form-control form-control-lg" type="text" placeholder="Masukkan NIK" />
                                                </div>
                                                @error('nik_ktp')
                                                    <p>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button id="submitBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cetakAntrian">
                                            Lihat
                                          </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </section>
            <!-- Input Sizing end -->

        </div>
    </div>
</div>
<script>
    $('#submitBtn').click(function() {
     $('#snik_ktp').text($('#bnik_ktp').val());
     $('#snama_lengkap').text($('#bnik_ktp').val());
     $('#snomor_antrian').text($('#bnik_ktp').val());
});

$('#submit').click(function(){
    alert("Yakin ingin mencetak?");
    $('#formfield').submit();
});
</script>
@endsection
