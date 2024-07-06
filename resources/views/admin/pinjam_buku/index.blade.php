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
        <h5 class="card-title">Data Pinjam Buku <span>| Tambahkan Data</span></h5>
        @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $item)                  
              <li>{{$item}}</li>
              @endforeach
            </ul>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
            
        @endif
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
          Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Buku</th>
              <th scope="col">Murid Atau Guru</th>          
              <th scope="col">Jumlah Pinjam</th>             
              <th scope="col">Tanggal Pinjam</th>             
              <th scope="col">Batas Di Kembalikan</th>             
              <th scope="col">Denda</th>             
              <th scope="col">Status</th>             
              <th scope="col">Action</th>             
            </tr>
          </thead>
          <tbody>
            @php
            use Carbon\Carbon;
            @endphp
            @foreach ($pinjam_buku as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{ $value['buku']['judul'] }}</td>
                @if ($value['murid']['status'] == 'guru')
                  <td>{{ $value['murid']['nama'] }} (guru)</td> 
                  @else
                  <td>{{ $value['murid']['nama'] }} (murid)</td> 
                @endif
                <td>{{$value['jumlah_pinjam']}}</td>                
                <td>{{$value['tanggal_pinjam']}}</td>                
                <td>{{$value['tanggal_di_kembalikan']}}</td>  

                @php
                    $denda_per_hari = 1000;                  
                    $carbon_tanggal_hari_ini = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');


                    $tanggal_kembali = Carbon::parse($value['tanggal_di_kembalikan']); 
                    $tanggal_hari_ini =  Carbon::parse($carbon_tanggal_hari_ini);

                    if ($tanggal_kembali < $tanggal_hari_ini) {
                      $selisih_hari = $tanggal_hari_ini->diffInDays($tanggal_kembali);
                      $denda = $selisih_hari * $denda_per_hari;                      
                    } else {
                      $denda = 0; 
                    }
                @endphp 
                   
                  @if($denda <= 0)                      
                    <td><p>Tidak Ada Denda Yang Harus Di Bayar</p></td>          
                  @else
                    @if ($denda > 0)
                      <td>Rp. {{ number_format($denda, 0, ',', '.') }}</td>  
                    {{-- @else    
                      <td><p>Tidak Ada Denda Yang Harus Di Bayar</p></td>           --}}
                    @endif
                  @endif
                  <td>
                    @if ($denda > 0)
                      <button class="btn btn-danger btn-sm">Terlambat</button>                                          
                    @else
                      <button class="btn btn-success btn-sm">Normal</button>
                    @endif
                  </td>
                  <td>
                    {{-- <a href="{{url('admin/pinjam_buku/edit/'.$value['id'])}}" data-bs-toggle="modal" data-bs-target="#EditModal{{$value['id']}}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i>Edit</a> --}}
                    <a href="{{url('admin/pinjam_buku/show/'.$value['id'])}}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>Detail</a>
                    {{-- <form action="{{url('admin/pinjam_buku/delete/'.$value['id'])}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Hapus</button>
                    </form> --}}
                </td>
            </tr> 

            {{-- <div class="modal fade" id="EditModal{{$value['id']}}" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pinjam Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{url('admin/pinjam_buku/update/'.$value['id'])}}"  method="post">
                      @csrf
                      @method('PUT')
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Buku</label>
                        <div class="input-group has-validation">
                          <select name="buku_id" id="buku_id" required class="form-select">
                            <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Daftar Buku --</option>
                            @foreach ($buku as $daftar_buku)
                            <option value="{{$daftar_buku->id}}" {{ $value['buku_id'] == $daftar_buku->id ? 'selected' : '' }}>{{$daftar_buku->judul}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>   
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Murid</label>
                        <div class="input-group has-validation">
                          <select name="murid_id" id="murid_id" required class="form-select">
                            <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Daftar Murid --</option>
                            @foreach ($murid as $daftar_murid)
                            <option value="{{$daftar_murid->id}}" {{ $value['murid_id'] == $daftar_murid->id ? 'selected' : '' }}>{{$daftar_murid->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>                                                                                                                                   
                          <div class="col-12">
                            <label for="yourUsername" class="form-label">Jumlah Pinjam</label>
                            <div class="input-group has-validation">
                              <input type="number" class="form-control" value="{{$value['jumlah_pinjam']}}" name="jumlah_pinjam" required>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="yourUsername" class="form-label">Tanggal Pinjam</label>
                            <div class="input-group has-validation">
                              <input type="date" class="form-control" name="tanggal_pinjam" value="{{$value['tanggal_pinjam']}}" required>
                            </div>
                          </div> 
                          <div class="col-12">
                            <label for="yourUsername" class="form-label">Tanggal Di Kembalikan</label>
                            <div class="input-group has-validation">
                              <input type="date" class="form-control" name="tanggal_di_kembalikan" value="{{$value['tanggal_di_kembalikan']}}" required>
                            </div>
                          </div> 
                         
                              <input type="hidden" readonly  class="form-control" name="jumlah_denda" value="{{$value['jumlah_denda']}}" required>
                              <input type="hidden" readonly  class="form-control" name="status" value="{{$value['jumlah_denda']}}" required>
                           
                  
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> --}}
            @endforeach

          </tbody>
        </table>

      </div>

    </div>
  </div>


  
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Pinjam Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/pinjam_buku/create')}}"  method="post">
            @csrf
            <div class="col-12">
              <label for="yourUsername" class="form-label">Buku</label>
              <div class="input-group has-validation">
                <select name="buku_id" id="buku_id" required class="form-select">
                  <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Daftar Buku --</option>
                  @foreach ($buku as $daftar_buku)
                  <option value="{{$daftar_buku->id}}">{{$daftar_buku->judul}}</option>
                  @endforeach
                </select>
              </div>
            </div>   
            <div class="col-12">
              <label for="yourUsername" class="form-label">Murid</label>
              <div class="input-group has-validation">
                <select name="murid_id" id="murid_id" required class="form-select">
                  <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Daftar Murid Atau guru --</option>
                  @foreach ($murid as $daftar_murid)
                  <option value="{{$daftar_murid->id}}">{{$daftar_murid->nama}} (Murid)</option>
                  @endforeach
                  <option value="" disabled>-----------------</option>
                  @foreach ($guru as $daftar_guru)
                  <option value="{{$daftar_guru->id}}">{{$daftar_guru->nama}} (Guru)</option>
                  @endforeach
                </select>
              </div>
            </div>                                                                                                                                   
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Jumlah Pinjam</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" name="jumlah_pinjam" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Tanggal Pinjam</label>
                  <div class="input-group has-validation">
                    <input type="date" class="form-control" name="tanggal_pinjam" required onchange="setReturnDate()">
                  </div>
                </div> 
                {{-- <div class="col-12">
                  <label for="yourUsername" class="form-label">Tanggal Di Kembalikan</label>
                  <div class="input-group has-validation"> --}}
                    <input type="hidden" class="form-control" name="tanggal_di_kembalikan" required>
                  {{-- </div>
                </div>  --}}
                
                    <input type="hidden" readonly class="form-control" name="jumlah_denda" value="0" required>
                    <input type="hidden" readonly class="form-control" name="status" value="0" required>

               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <script>
    function setReturnDate() {
        let tanggalPinjam = document.querySelector('input[name="tanggal_pinjam"]').value;
        if (tanggalPinjam) {
            let tanggalPinjamDate = new Date(tanggalPinjam);
            tanggalPinjamDate.setDate(tanggalPinjamDate.getDate() + 7);
            let year = tanggalPinjamDate.getFullYear();
            let month = (tanggalPinjamDate.getMonth() + 1).toString().padStart(2, '0');
            let day = tanggalPinjamDate.getDate().toString().padStart(2, '0');
            document.querySelector('input[name="tanggal_di_kembalikan"]').value = `${year}-${month}-${day}`;
        }
    }
  </script>
  
@endsection