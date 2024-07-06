@extends('template.admin.index')
@section('content_admin')

<div class="pagetitle">
    <h1>Pengembalian</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Detail Pengembalian</a></li>
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
            @if ($pengembalian_buku['murid']['status'] == 'guru')
              <h5 class="card-title">Data Guru</h5>            
              @else
              <h5 class="card-title">Data Murid</h5>            
            @endif        
            <div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama:</label>
                <div class="col-sm-8">                
                  <b>{{ $pengembalian_buku['murid']['nama'] }} ({{ $pengembalian_buku['murid']['status'] }})</b>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">No Telepon:</label>
                <div class="col-sm-8">
                    <b>{{ $pengembalian_buku['murid']['no_telepon'] }}</b>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Alamat:</label>
                <div class="col-sm-8">
                    <b>{{ $pengembalian_buku['murid']['alamat'] }}</b>
                </div>
              </div> 
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Lahir:</label>
                <div class="col-sm-8">
                    <b>{{ $pengembalian_buku['murid']['tanggal_lahir'] }}</b>
                </div>
              </div> 
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin:</label>
                <div class="col-sm-8">
                    <b>{{ $pengembalian_buku['murid']['jenis_kelamin'] }}</b>
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
                    <b>{{ $pengembalian_buku['buku']['judul'] }}</b>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Pengarang:</label>
                  <div class="col-sm-8">
                      <b>{{ $pengembalian_buku['buku']['pengarang'] }}</b>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Penerbit:</label>
                  <div class="col-sm-8">
                      <b>{{ $pengembalian_buku['buku']['penerbit'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Isbn:</label>
                  <div class="col-sm-8">
                      <b>{{ $pengembalian_buku['buku']['isbn'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Tahun:</label>
                  <div class="col-sm-8">
                      <b>{{ $pengembalian_buku['buku']['tahun'] }}</b>
                  </div>
                </div> 
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Sampul Buku:</label>
                    <div class="col-sm-8">
                        <b><img src="{{asset('storage/'.$pengembalian_buku['buku']['sampul_buku'] )}}" class="w-100" alt="sampul buku" alt=""></b>
                    </div>
                  </div>                                         
              </div>

          </div>
        </div>



      </div>
    </div>      
    </div>

      <div class="col-lg-12">
        


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
                      <b>{{ $pengembalian_buku['jumlah_pinjam'] }}</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Pinjam:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['tanggal_pinjam'] }}</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Batas Waktu Pengembalian:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['tanggal_di_kembalikan'] }}</b>
                    </div>
                  </div> 
                  {{-- <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Lahir:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['murid']['tanggal_lahir'] }}</b>
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['murid']['jenis_kelamin'] }}</b>
                    </div>
                  </div>                                          --}}
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
                <h5 class="card-title">Detail Denda</h5>            
                <div>
                  @php
                    use Carbon\Carbon;
                  @endphp
                   @php
                   $denda_per_hari = 1000;                  
                   $carbon_tanggal_hari_ini = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
   
   
                   $tanggal_kembali = Carbon::parse($pengembalian_buku['tanggal_di_kembalikan']); 
                   $tanggal_hari_ini =  Carbon::parse($carbon_tanggal_hari_ini);
   
                   if ($tanggal_kembali < $tanggal_hari_ini) {
                     $selisih_hari = $tanggal_hari_ini->diffInDays($tanggal_kembali);
                     $denda = $selisih_hari * $denda_per_hari;                      
                   } else {
                     $denda = 0; 
                   }
               @endphp
   
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Terlambat:</label>
                    <div class="col-sm-8">                
                      <b>{{ $selisih_hari ?? 0 }} Hari</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Pinjam:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['tanggal_pinjam'] }}</b>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Batas Waktu Pengembalian:</label>
                    <div class="col-sm-8">
                        <b>{{ $pengembalian_buku['tanggal_di_kembalikan'] }}</b>
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Waktu Pengembalian:</label>
                    <div class="col-sm-8">
                        <b>{{ \Carbon\Carbon::parse($pengembalian_buku['created_at'])->format('Y-m-d') }}</b>
                    </div>
                  </div>  
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Total denda:</label>
                    <div class="col-sm-8">
                        <b>Rp. {{ number_format($denda, 0, ',', '.') }}</b>
                    </div>
                  </div>                 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Telah Di Bayar:</label>
                    <div class="col-sm-8">
                        <b>Rp. {{ number_format($pengembalian_buku['jumlah_denda'], 0, ',', '.') }}</b>
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Sisa Denda Yang Harus Di Bayar:</label>
                    <div class="col-sm-8">
                        {{-- <b>Rp. {{ number_format($denda, 0, ',', '.') - number_format($pengembalian_buku['jumlah_denda'], 0, ',', '.')  }}</b> --}}
                        <b>Rp. {{ number_format($denda - $pengembalian_buku['jumlah_denda'], 0, ',', '.') }}</b>

                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Status:</label>
                    <div class="col-sm-8">
                      @if($pengembalian_buku['jumlah_denda'] < $denda)
                          <b><span class="btn btn-danger">Belum Lunas</span></b>
                      @else
                          <b><span class="btn btn-success">Lunas</span></b>
                      @endif
                    </div>
                  </div> 
                  @if($pengembalian_buku['jumlah_denda'] < $denda)
                    <div class="row mb-3">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">Bayar Sekarang:</label>
                      <div class="col-sm-8">
                          <b><a href="{{url('admin/pengembalian_buku/bayar_denda/'. $pengembalian_buku['id'] )}}" class="btn btn-success"><i class="bi bi-arrow-bar-down" style="margin-right: 5px"></i>Klik Di Sini</a></b>
                      </div>
                    </div> 
                  @endif
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"><a href="{{url('admin/pengembalian_buku')}}" class="btn btn-primary">Kembali</a></label>        
                  </div> 

                </div>
            

              </div>
            </div>
          </div>
      </div>
  </section>
@endsection