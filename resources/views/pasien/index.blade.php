@extends('server.master')

@section('content')

<div class="app-content content">
    <div class="content-body">
        @if (session('notification'))
        <script>
            Swal.fire({
                title: 'Info',
                text: '{{ session('notification') }}',
                icon: 'info',
                confirmButtonText: 'Ok'
            })

        </script>
        @endif
        <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-lg-12 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Activation</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($dataPasien as $Pasien)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="fw-bolder">{{ $Pasien->kode }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span>{{ $Pasien->nik_ktp }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">{{ $Pasien->nama_lengkap }}</span>

                                            </div>
                                        </td>
                                        <td>{{ $Pasien->jenis_kelamin }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">{{ $Pasien->no_hp }}</span>
                                                <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="bookmark-wrapper d-flex align-items-center">
                                            <ul class="nav navbar-nav bookmark-icons">
                                                <a href="/daftar-pasien/{{ $Pasien->id }}/pasien"><li class="btn btn-warning">Edit</li></a>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Developer Meetup Card -->

        </div>
    </div>
    {{-- <script src="{{ asset('server/assets/js/pasien.js') }}"></script> --}}

    @endsection

