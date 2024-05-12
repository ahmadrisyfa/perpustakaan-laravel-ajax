@extends('template.admin.index')
@section('content_admin')

<div class="pagetitle">
    <h1>Peminjaman</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Detail Peminjaman</a></li>
        {{-- <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Layouts</li> --}}
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
      <div class="col-lg-12">
    <div class="row">

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Murid</h5>            
            <div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama:</label>
                <div class="col-sm-8">                
                  <b>{{ $pinjam_buku['murid']['nama'] }}</b>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">No Telepon:</label>
                <div class="col-sm-8">
                    <b>{{ $pinjam_buku['murid']['no_telepon'] }}</b>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Alamat:</label>
                <div class="col-sm-8">
                    <b>{{ $pinjam_buku['murid']['alamat'] }}</b>
                </div>
              </div> 
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Lahir:</label>
                <div class="col-sm-8">
                    <b>{{ $pinjam_buku['murid']['tanggal_lahir'] }}</b>
                </div>
              </div> 
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin:</label>
                <div class="col-sm-8">
                    <b>{{ $pinjam_buku['murid']['jenis_kelamin'] }}</b>
                </div>
              </div>                                         
            </div>

          </div>
        </div>    
      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Buku</h5>

            <div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Judul:</label>
                  <div class="col-sm-8">                
                    <b>{{ $pinjam_buku['buku']['judul'] }}</b>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Pengarang:</label>
                  <div class="col-sm-8">
                      <b>{{ $pinjam_buku['buku']['pengarang'] }}</b>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Penerbit:</label>
                  <div class="col-sm-8">
                      <b>{{ $pinjam_buku['buku']['penerbit'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Isbn:</label>
                  <div class="col-sm-8">
                      <b>{{ $pinjam_buku['buku']['isbn'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Tahun:</label>
                  <div class="col-sm-8">
                      <b>{{ $pinjam_buku['buku']['tahun'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Sampul Buku:</label>
                    <div class="col-sm-8">
                        <b><img src="{{asset('storage/'.$pinjam_buku['buku']['sampul_buku'] )}}" class="w-100" alt="sampul buku" alt=""></b>
                    </div>
                  </div>                                         
              </div>

          </div>
        </div>



      </div>
    </div>      
    </div>

    <div class="col-lg-12">
        <div class="row">
    
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Pinjam Buku</h5>            
                <div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jumlah Pinjam:</label>
                    <div class="col-sm-8">                
                      <b>{{ $pinjam_buku['jumlah_pinjam'] }}</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Pinjam:</label>
                    <div class="col-sm-8">
                        <b>{{ $pinjam_buku['tanggal_pinjam'] }}</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Di Kembalikan:</label>
                    <div class="col-sm-8">
                        <b>{{ $pinjam_buku['tanggal_di_kembalikan'] }}</b>
                    </div>
                  </div> 
                  {{-- <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Lahir:</label>
                    <div class="col-sm-8">
                        <b>{{ $pinjam_buku['murid']['tanggal_lahir'] }}</b>
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin:</label>
                    <div class="col-sm-8">
                        <b>{{ $pinjam_buku['murid']['jenis_kelamin'] }}</b>
                    </div>
                  </div>                                          --}}
                </div>
    
              </div>
            </div>
          </div>
        </div>
  </section>
@endsection