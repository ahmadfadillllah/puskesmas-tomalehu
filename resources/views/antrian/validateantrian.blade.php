@extends('server.master')

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
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
                                        <h4 class="card-title">Review Antrian</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="largeInput">NIK KTP</label>
                                                    <input name="nik_ktp" class="form-control form-control-lg" type="text" value="{{ $dataPasien->nik_ktp }}" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="largeInput">Nama Lengkap</label>
                                                    <input class="form-control form-control-lg" type="text" value="{{ $dataPasien->nama_lengkap }}" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="largeInput">Nomor Antrian</label>
                                                    <input class="form-control form-control-lg" type="text" value="{{ $dataPasien->nomor_antrian }}" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="submitBtn" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cetakAntrian">
                                            Cetak
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
@endsection
