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
            <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. Antrian & NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Umur</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Developer Meetup Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{ asset('server') }}/app-assets/images/illustration/email.svg" alt="Meeting Pic"
                            height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0"><?php echo date('D'); ?></h6>
                                <h3 class="mb-0"><?php echo date('d'); ?></h3>
                            </div>
                            <div class="my-auto">
                                <h4 id="hasil" class="card-title mb-25">{{ $jumlahPasien }}</h4>
                                <p class="card-text mb-0">Jumlah Antrian hari ini</p>
                            </div>
                        </div>
                        <div class="mt-0">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0"><?php echo date('l, d-m-Y'); ?></h6>
                                <small><?php echo date("h:i:sa"); ?></small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Puskesmas Tomalehu</h6>
                                <small>Indonesia</small>
                            </div>
                        </div>
                        <br>
                        <div class="bookmark-wrapper d-flex align-items-center">
                            <div class="more-info">
                                <h6 class="mb-0">No Antrian Saat ini : P{{$dataAntrian->nomor_antrian}}
                                </h6>
                            </div>
                        </div>
                        <br>

                        <form action="/antrian/{{ $dataAntrian->nomor_antrian }}/keluhan" method="GET">
                            <div class="bookmark-wrapper d-flex align-items-center">
                                <ul class="nav navbar-nav bookmark-icons">
                                    <input type="text" id="last-name-column" class="form-control" value="{{ $dataAntrian->id }}" name="id" hidden/>
                                    <li>
                                        <button type="submit" class="btn btn-success">Panggil</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    <!--/ Developer Meetup Card -->
    {{-- Menampilkan Data --}}
    <script src="{{ asset('server/assets/js/tampil.js') }}"></script>

<script>
    var table = document.getElementById("nilai"), sumHsl = 0;
    for(var t = 1; t < table.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[3].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = "+ sumHsl;

</script>
<script>
    var table = document.getElementById("nilai"), sumHsl = 0;
    for(var t = 1; t < table.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[3].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = "+ sumHsl;

</script>



    @endsection

