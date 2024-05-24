@extends('template.admin.index')
@section('content_admin')
<style>
    .badge{cursor: pointer;}    
    .dataTable-input{        
        border: 1px solid black;
    }        
    @media only screen and (max-width: 520px) {
        .dataTable-dropdown  {
          display: none;
        }
    }
</style>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Data Denda <span>| Denda</span></h5>
        {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data</button> --}}
            @if (session()->has('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
            @endif
                  <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="belum-lunas-tab" data-bs-toggle="tab" data-bs-target="#bordered-belum-lunas" type="button" role="tab" aria-controls="belum-lunas" aria-selected="true">Belum Lunas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="lunas-tab" data-bs-toggle="tab" data-bs-target="#bordered-lunas" type="button" role="tab" aria-controls="lunas" aria-selected="false">Lunas</button>
                    </li>
                   
                  </ul>
                  <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-belum-lunas" role="tabpanel" aria-labelledby="belum-lunas-tab">
                    
                    <h5 class="card-title">Data Belum Lunas</h5>
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          {{-- <th scope="col">#</th> --}}
                          <th scope="col">Buku</th>
                          <th scope="col">Murid</th>          
                          <th scope="col">Jumlah Pinjam</th>             
                          {{-- <th scope="col">Tanggal Pinjam</th>             
                          <th scope="col">Batas Di Kembalikan</th>              --}}
                          <th scope="col">Tanggal Pengembalian</th>             
                          <th scope="col">Denda Di Bayar</th>             
                          <th scope="col">Jumlah Denda</th>             
                          <th scope="col" colspan="2" style="text-align: center">Action</th>             
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          use Carbon\Carbon;
                        @endphp

                        @foreach ($denda_belum_lunas as $value)  
                        
                          @php
                              $denda_per_hari = 1000;                  
                              $carbon_tanggal_hari_ini = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
              
              
                              $tanggal_kembali = Carbon::parse($value['tanggal_di_kembalikan']); 
                              $created_at = Carbon::parse($value['created_at']); 

                              $tanggal_hari_ini =  Carbon::parse($carbon_tanggal_hari_ini);
              
                              if ($tanggal_kembali < $tanggal_hari_ini) {
                                $selisih_hari = $tanggal_hari_ini->diffInDays($tanggal_kembali);
                                $denda = $selisih_hari * $denda_per_hari;                      
                              } else {
                                $denda = 0; 
                              }

                              $cek_selisih = $tanggal_kembali->diffInDays($created_at);

                              $notifikasi_pembayaran = $denda - $value['jumlah_denda'];
                          @endphp       

                          @if ($value['jumlah_denda'] < $denda)
                            <tr>
                                {{-- <th scope="row">{{$loop->iteration}}</th>      --}}
                                <td>{{ $value['buku']['judul'] }}</td>
                                <td>{{ $value['murid']['nama'] }}</td>
                                <td>{{$value['jumlah_pinjam']}}</td>                
                                {{-- <td>{{$value['tanggal_pinjam']}}</td>                
                                <td>{{$value['tanggal_di_kembalikan']}}</td>   --}}
                                <td style="color:orange;font-weight:bold">
                                  {{ \Carbon\Carbon::parse($value['created_at'])->format('Y-m-d') }}
                                  <br>
                                  <span style="color:rgb(180, 15, 15);font-weight:bold">
                                    Terlambat : {{$cek_selisih}} Hari
                                  </span> 
                                </td>
                                <td>
                                  Rp. {{ number_format($value['jumlah_denda'], 0, ',', '.') }}
                                </td>
                                <td>
                                  Rp. {{ number_format($denda, 0, ',', '.') }}
                                </td>
                                                                      
                                
                                  {{-- <td>
                                    @if ($value['jumlah_denda'] < $denda)
                                      <button class="btn btn-danger btn-sm">Menunggak</button>                                          
                                    @else
                                      <button class="btn btn-success btn-sm">Selesai</button>
                                    @endif
                                  </td> --}}
                                  <td>
                                    <a href="{{url('admin/denda/show/'.$value['id'])}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>Detail</a>                                 
                                  </td>
                                  <td>
                                    <form action="{{url('admin/denda/update_jumlah_denda/'.$value['id'])}}" onsubmit="return confirm('Yakin Ingin Membayar Lunas Buku Ini? Jumlah Bayar: Rp. {{ number_format($notifikasi_pembayaran, 0, ',', '.') }}')"   method="post">                                      
                                      @csrf
                                      <input type="hidden" name="jumlah_denda" value="{{$denda}}">
                                      <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i>Bayar</button>
                                      {{-- <a href="{{url('admin/pengembalian_buku/show/'.$value['id'])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i>Bayar</a>                                  --}}
                                    </form>
                                  </td>
                            </tr>  
                          @endif                              
                        @endforeach
            
                      </tbody>
                    </table>
                    </div>
                    <div class="tab-pane fade" id="bordered-lunas" role="tabpanel" aria-labelledby="lunas-tab">
                    <h5 class="card-title">Data Lunas</h5>
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          {{-- <th scope="col">#</th> --}}
                          <th scope="col">Buku</th>
                          <th scope="col">Murid</th>          
                          <th scope="col">Jumlah Pinjam</th>             
                          {{-- <th scope="col">Tanggal Pinjam</th>             
                          <th scope="col">Batas Di Kembalikan</th>              --}}
                          <th scope="col">Tanggal Pengembalian</th>             
                          <th scope="col">Denda Di Bayar</th>             
                          <th scope="col">Jumlah Denda</th>             
                          <th scope="col" colspan="2" style="text-align: center">Action</th>             
                        </tr>
                      </thead>
                      <tbody>                      

                        @foreach ($denda_lunas as $value)  
                        
                          @php
                              $denda_per_hari = 1000;                  
                              $carbon_tanggal_hari_ini = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
              
              
                              $tanggal_kembali = Carbon::parse($value['tanggal_di_kembalikan']); 
                              $created_at = Carbon::parse($value['created_at']); 

                              $tanggal_hari_ini =  Carbon::parse($carbon_tanggal_hari_ini);
              
                              if ($tanggal_kembali < $tanggal_hari_ini) {
                                $selisih_hari = $tanggal_hari_ini->diffInDays($tanggal_kembali);
                                $denda = $selisih_hari * $denda_per_hari;                      
                              } else {
                                $denda = 0; 
                              }

                              $cek_selisih = $tanggal_kembali->diffInDays($created_at);

                              $notifikasi_pembayaran = $denda - $value['jumlah_denda'];
                          @endphp       

                          @if ($value['jumlah_denda'] = $denda)
                            <tr>
                                {{-- <th scope="row">{{$loop->iteration}}</th>      --}}
                                <td>{{ $value['buku']['judul'] }}</td>
                                <td>{{ $value['murid']['nama'] }}</td>
                                <td>{{$value['jumlah_pinjam']}}</td>                
                                {{-- <td>{{$value['tanggal_pinjam']}}</td>                
                                <td>{{$value['tanggal_di_kembalikan']}}</td>   --}}
                                <td style="color:orange;font-weight:bold">
                                  {{ \Carbon\Carbon::parse($value['created_at'])->format('Y-m-d') }}
                                  <br>
                                  <span style="color:rgb(180, 15, 15);font-weight:bold">
                                    Terlambat : {{$cek_selisih}} Hari
                                  </span> 
                                </td>
                                <td>
                                  Rp. {{ number_format($value['jumlah_denda'], 0, ',', '.') }}
                                  <br>
                                  <span class="btn btn-sm btn-success">Lunas</span>
                                </td>
                                <td>
                                  Rp. {{ number_format($denda, 0, ',', '.') }}
                                </td>
                                                                      
                                
                                  {{-- <td>
                                    @if ($value['jumlah_denda'] < $denda)
                                      <button class="btn btn-danger btn-sm">Menunggak</button>                                          
                                    @else
                                      <button class="btn btn-success btn-sm">Selesai</button>
                                    @endif
                                  </td> --}}
                                  <td>
                                    <a href="{{url('admin/denda/show/'.$value['id'])}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>Detail</a>                                 
                                  </td>
                                  {{--  <td>
                                   <form action="{{url('admin/denda/update_jumlah_denda/'.$value['id'])}}" onsubmit="return confirm('Yakin Ingin Membayar Lunas Buku Ini? Jumlah Bayar: Rp. {{ number_format($notifikasi_pembayaran, 0, ',', '.') }}')"   method="post">                                      
                                      @csrf
                                      <input type="hidden" name="jumlah_denda" value="{{$denda}}">
                                      <button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i>Bayar</button>
                                    </form> 
                                  </td>
                                  --}}
                            </tr>  
                          @endif                              
                        @endforeach
            
                      </tbody>
                    </table>

                    </div>
                  </div>
        

      </div>

    </div>
  </div>



  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Denda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" >
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Nama</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="nama" required>
                  </div>
                </div>                                                      
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Denda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">
                <input readonly type="hidden" class="form-control" id="edit_id" name="edit_id">
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Nama</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="edit_nama" required>
                  </div>
                </div>                                                  
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#createForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("nama", $("#nama").val());
            $.ajax({
                url: '{{ url('admin/denda/create') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        $(document).on('click', '.edit-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin/denda/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_nama").val(data.nama);
                    },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });    
        $("#editForm").submit(function(event) {
            event.preventDefault();
            var id = $('#edit_id').val();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("nama", $("#edit_nama").val());
            $.ajax({
                url: '{{ url('admin/denda/update') }}/' + id,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: '{{ url('admin/denda/destroy') }}/' + id,
                    type: 'get',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection