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

<!-- Transaction Card -->
<div class="col-lg-4 col-md-6 col-12">
    <div class="card card-transaction">
        <div class="card-header">
            <h4 class="card-title">Transactions</h4>
            <div class="dropdown chart-dropdown">
                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Last 28 Days</a>
                    <a class="dropdown-item" href="#">Last Month</a>
                    <a class="dropdown-item" href="#">Last Year</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="transaction-item">
                <div class="d-flex">
                    <div class="avatar bg-light-primary rounded float-start">
                        <div class="avatar-content">
                            <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="transaction-percentage">
                        <h6 class="transaction-title">Wallet</h6>
                        <small>Starbucks</small>
                    </div>
                </div>
                <div class="fw-bolder text-danger">- $74</div>
            </div>
            <div class="transaction-item">
                <div class="d-flex">
                    <div class="avatar bg-light-success rounded float-start">
                        <div class="avatar-content">
                            <i data-feather="check" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="transaction-percentage">
                        <h6 class="transaction-title">Bank Transfer</h6>
                        <small>Add Money</small>
                    </div>
                </div>
                <div class="fw-bolder text-success">+ $480</div>
            </div>
            <div class="transaction-item">
                <div class="d-flex">
                    <div class="avatar bg-light-danger rounded float-start">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="transaction-percentage">
                        <h6 class="transaction-title">Paypal</h6>
                        <small>Add Money</small>
                    </div>
                </div>
                <div class="fw-bolder text-success">+ $590</div>
            </div>
            <div class="transaction-item">
                <div class="d-flex">
                    <div class="avatar bg-light-warning rounded float-start">
                        <div class="avatar-content">
                            <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="transaction-percentage">
                        <h6 class="transaction-title">Mastercard</h6>
                        <small>Ordered Food</small>
                    </div>
                </div>
                <div class="fw-bolder text-danger">- $23</div>
            </div>
            <div class="transaction-item">
                <div class="d-flex">
                    <div class="avatar bg-light-info rounded float-start">
                        <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                        </div>
                    </div>
                    <div class="transaction-percentage">
                        <h6 class="transaction-title">Transfer</h6>
                        <small>Refund</small>
                    </div>
                </div>
                <div class="fw-bolder text-success">+ $98</div>
            </div>
        </div>
    </div>
</div>
<!--/ Transaction Card -->
</div>
</section>
<!-- Dashboard Ecommerce ends -->

</div>
</div>
</div>


@endsection
