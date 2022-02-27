@extends('server.master')

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">

            <!-- Input Sizing start -->
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
                    <form action="{{ route('cetakAntrian') }}" method="POST">
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
                                                <input name="nik_ktp" class="form-control form-control-lg" type="text" placeholder="Masukkan NIK" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Input Sizing end -->

        </div>
    </div>
</div>
@endsection
