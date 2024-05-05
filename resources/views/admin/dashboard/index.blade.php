@extends('template.admin.index')
@section('content_admin')
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('template_admin')}}/index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

        <div class="col-lg-12">
        <div class="row">
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Rak <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-hdd-rack"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$rak}}</h6>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Category <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-life-preserver"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$category}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Buku <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$buku}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Akun Login <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-bar-right"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$user}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Murid <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$murid}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Pinjam <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-archive"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$jumlah_pinjam_buku}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">                
                    <div class="card-body">
                    <h5 class="card-title">Data Pinjam Buku ( Belum Di Kembalikan ) <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-archive"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{$jumlah_pinjam_buku_belum_di_kembalikan}}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            

            <!-- Reports -->

        </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
    </div>
    </section>
@endsection