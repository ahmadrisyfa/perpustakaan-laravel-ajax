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
                  <form action="{{url('admin/pengembalian_buku/bayar_denda/'.$pengembalian_buku['id'])}}" method="post">
                    @csrf
                    @method('PUT')
                      @if($pengembalian_buku['jumlah_denda'] < $denda)
                        <div class="row mb-3">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">Jumlah Bayar:</label>
                          <div class="col-sm-8">
                          <b>
                            <input type="number" required name="proses_jumlah_denda" id="proses_jumlah_denda" class="form-control" placeholder="Denda Yang Harus Di Bayar Rp. {{ number_format($denda - $pengembalian_buku['jumlah_denda'], 0, ',', '.') }}">
                            <input type="hidden" name="jumlah_denda" id="jumlah_denda">
                          </b>

                          <script>
                              document.getElementById('proses_jumlah_denda').addEventListener('input', function() {
                                  var denda = parseFloat({{ $denda }});
                                  var pengembalian_buku_jumlah_denda = parseFloat({{ $pengembalian_buku['jumlah_denda'] }});

                                  var maxInput = denda - pengembalian_buku_jumlah_denda;

                                  var proses_jumlah_denda = parseFloat(this.value.replace(/\D/g, ''));

                                  if (proses_jumlah_denda > maxInput) {
                                      alert("Nilai yang dimasukkan melebihi sisa denda yang harus di bayar");
                                      this.value = maxInput;
                                      proses_jumlah_denda = maxInput;
                                  }

                                  var jumlah_denda = pengembalian_buku_jumlah_denda + proses_jumlah_denda;

                                  document.getElementById('jumlah_denda').value = jumlah_denda.toFixed(0); 
                              });
                          </script>

                          </div>
                        </div> 
                      @endif
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label"><a href="{{url('admin/pengembalian_buku')}}" class="btn btn-primary">Kembali</a></label>        
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div> 
                  </form>

                </div>
            

              </div>
            </div>
          </div>
      </div>
  </section>
@endsection