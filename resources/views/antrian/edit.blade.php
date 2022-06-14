@extends('server.master')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Biodata Pasien</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST" action="/antrian/{{ $dataPasien->nomor_antrian }}/updatekeluhan">
                                    {{ csrf_field() }}
                                    <input type="text" id="last-name-column" class="form-control" value="{{ $dataPasien->id }}" name="id" hidden/>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">NIK KTP</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ $dataPasien->nik_ktp }}" name="nik_ktp" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Nama Lengkap</label>
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $dataPasien->nama_lengkap }}" name="nama_lengkap" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Umur</label>
                                                <input type="text" id="city-column" class="form-control" value="{{ $dataPasien->umur }}" name="umur" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="country-floating">Jenis Kelamin</label>
                                                <input type="text" id="country-floating" class="form-control" name="jenis_kelamin" value="{{ $dataPasien->jenis_kelamin }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Alamat</label>
                                                <input type="text" id="company-column" class="form-control" name="alamat" value="{{ $dataPasien->alamat }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">No. Handphone</label>
                                                <input type="email" id="email-id-column" class="form-control" name="no_hp" value="{{ $dataPasien->no_hp }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Keluhan</label>
                                                <textarea type="text" id="company-column" class="form-control" name="keluhan" /></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Jenis Obat</label>
                                                <input type="text" id="email-id-column" class="form-control" name="jenis_obat" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>

                                        </div>
                                        <div class="col-6">
                                            <form action="/antrian/{{ $dataPasien->nomor_antrian }}/skip" method="GET">
                                                {{ csrf_field() }}
                                                <div class="bookmark-wrapper d-flex align-items-center">
                                                    <ul class="nav navbar-nav bookmark-icons">
                                                        <input type="text" id="last-name-column" class="form-control" value="{{ $dataPasien->id }}" name="id" hidden/>
                                                        <li>
                                                            <button type="submit" onclick="return confirm('Yakin ingin skip pasien tersebut?')" class="btn btn-warning">Next</button>
                                                            {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Floating Label Form section end -->

        </div>
    </div>
</div>
<!-- END: Content-->>
</section>

@endsection
