@extends('server.master')

@section('content')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
        @if (session('notification'))
        <script>
            Swal.fire({
                title: 'Upss',
                text: '{{ session('notification') }}',
                icon: 'info',
                confirmButtonText: 'Ok'
            })

        </script>
        @endif
        <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Total Pasien</h6>
                                <h2 class="fw-bolder mb-1">{{ $jumlahPasien }}</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Total Antrian</h6>
                                <h2 class="fw-bolder mb-1">{{ $jumlahAntrian }}</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->
                </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Hai, {{ Auth::user()->name }}, Selamat datang</h4>
                            </div>
                            <p>Mohon gunakan aplikasi ini dengan bijak</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->
        </div>
    </div>
</div>
<!--/ Company Table Card -->
</div>
</section>
<!-- Dashboard Ecommerce ends -->

</div>
</div>
</div>


@endsection
