@extends('template.admin.index')
@section('content_admin')
    <style>
        .badge {
            cursor: pointer;
        }

        .dataTable-input {
            border: 1px solid black;
        }

        @media only screen and (max-width: 520px) {
            .dataTable-dropdown {
                display: none;
            }
        }
    </style>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="container">
                    <h5 class="card-title">Cetak Daftar Pinjam Buku <span>| Data Pinjam Buku</span></h5>
                    <form action="{{ url('admin/laporan/pinjam_buku') }}" method="POST" target="_blank">
                        @csrf
                        <div class="row">
                            <div class="col-5"><input type="date" required name="start_date" class="form-control"></div>
                            <div class="col-5"><input type="date" required name="end_date" class="form-control"></div>
                            <div class="col-2">
                                <button class="btn btn-success">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="container">
                    <h5 class="card-title">Cetak Daftar Pengembalian Buku <span>| Data Pengembalian Buku</span></h5>
                    <form action="{{ url('admin/laporan/pengembalian_buku') }}" method="POST" target="_blank">
                        @csrf
                        <div class="row">
                            <div class="col-5"><input type="date" required name="start_date" class="form-control"></div>
                            <div class="col-5"><input type="date" required name="end_date" class="form-control"></div>
                            <div class="col-2">
                                <button class="btn btn-warning">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="container">
                    <h5 class="card-title">Cetak Daftar Denda <span>| Data Denda </span></h5>
                    <form action="{{ url('admin/laporan/denda') }}" method="POST" target="_blank">
                        @csrf
                        <div class="row">
                            <div class="col-5"><input type="date" required name="start_date" class="form-control"></div>
                            <div class="col-5"><input type="date" required name="end_date" class="form-control"></div>
                            <div class="col-2">
                                <button class="btn btn-info">Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
