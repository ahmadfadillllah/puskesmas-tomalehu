@extends('server.master')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
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
                                <form class="form" method="POST" action="/daftar-pasien/{{ $pasien->id }}/updatepasien">
                                    {{ csrf_field() }}
                                    <input type="text" id="last-name-column" class="form-control" value="{{ $pasien->id }}" name="id" hidden/>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">NIK KTP</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ $pasien->nik_ktp }}" name="nik_ktp" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Nama Lengkap</label>
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $pasien->nama_lengkap }}" name="nama_lengkap" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Umur</label>
                                                <input type="number" id="city-column" class="form-control" value="{{ $pasien->umur }}" name="umur" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                                <label class="form-label" for="country-floating">Jenis Kelamin</label>
                                                <div class="form-label-group mb-4">
                                                    <select name="jenis_kelamin" class="form-control" required="required">
                                                        <optgroup label="Pilih Jenis Kelamin">
                                                        <option for="form_name" value="Laki-laki" @if ($pasien->jenis_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                                                        <option for="form_name" value="Perempuan" @if ($pasien->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                                        </optgroup>
                                                      </select>
                                                </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Alamat</label>
                                                <input type="text" id="company-column" class="form-control" name="alamat" value="{{ $pasien->alamat }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">No. Handphone</label>
                                                <input type="number" id="email-id-column" class="form-control" name="no_hp" value="{{ $pasien->no_hp }}" />
                                                <p>Penulisan No.Handphone yang benar 6285xxxxxx, Bukan diawali dari 0</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
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
