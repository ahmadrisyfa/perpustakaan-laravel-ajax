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
              <th scope="col">Murid</th>          
              <th scope="col">Jumlah Pinjam</th>             
              <th scope="col">Tanggal Pinjam</th>             
              <th scope="col">Tanggal Di Kembalikan</th>             
              <th scope="col">Denda</th>             
              <th scope="col">Status</th>             
              <th scope="col">Action</th>             
            </tr>
          </thead>
          <tbody>
            @foreach ($pinjam_buku as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{ $value['buku']['judul'] }}</td>
                <td>{{ $value['murid']['nama'] }}</td>
                <td>{{$value['jumlah_pinjam']}}</td>                
                <td>{{$value['tanggal_pinjam']}}</td>                
                <td>{{$value['tanggal_di_kembalikan']}}</td>  

                @php
                    $tanggal_kembali = $value['tanggal_di_kembalikan'];
                    $denda_per_hari = 1000;

                    $tanggal_hari_ini = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta'); // Mengubah zona waktu ke WIB

                    // Memeriksa apakah tanggal pengembalian lebih besar dari tanggal hari ini atau tidak
                    if ($tanggal_kembali > $tanggal_hari_ini) {
                        $denda = 0; // Jika ya, maka denda = 0
                    } else {
                        $selisih_hari = $tanggal_hari_ini->diffInDays($tanggal_kembali);

                        $denda = 0;
                        if ($selisih_hari > 7) {
                            $denda = ($selisih_hari - 7) * $denda_per_hari;
                        }
                    }
                @endphp 
                   
                  @if($value['status'] == 1)                      
                    <td><p>Tidak Ada Denda Yang Harus Di Bayar</p></td>          
                  @else
                    @if ($denda > 0)
                      <td>Rp. {{ number_format($denda, 0, ',', '.') }}</td>  
                    @else    
                      <td><p>Tidak Ada Denda Yang Harus Di Bayar</p></td>          
                    @endif
                  @endif
                  <td>
                    @if($value['status'] == 1)
                      <button class="btn btn-success btn-sm">Buku Sudah Di Kembalikan</button>                                          
                    @else
                      <button class="btn btn-danger btn-sm">Buku Belum Di Kembalikan</button>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('admin/pinjam_buku/edit/'.$value['id'])}}" data-bs-toggle="modal" data-bs-target="#EditModal{{$value['id']}}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i>Edit</a>
                    <form action="{{url('admin/pinjam_buku/delete/'.$value['id'])}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Hapus</buttonhref=>
                    </form>
                </td>
            </tr> 

            <div class="modal fade" id="EditModal{{$value['id']}}" tabindex="-1">
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
                          {{-- <div class="col-12">
                            <label for="yourUsername" class="form-label">Jumlah Denda <br> <span style="color: yellowgreen">*jika tidak ada denda isikan 0</span></label>
                            <div class="input-group has-validation"> --}}
                              <input type="hidden" readonly  class="form-control" name="jumlah_denda" value="{{$value['jumlah_denda']}}" required>
                            {{-- </div>
                          </div>    --}}
                          <div class="col-12">
                            <label for="yourUsername" class="form-label">Status</label>
                            <div class="input-group has-validation">
                              <select name="status" id="status" required class="form-select">
                                <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Status Pinjam Buku --</option>
                                <option value="0" {{ $value['status'] == 0 ? 'selected' : '' }}>Belum Di Kembalikan</option>
                                <option value="1" {{ $value['status'] == 1 ? 'selected' : '' }}>Sudah Di Kembalikan</option>

                              </select>
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
                  <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Daftar Murid --</option>
                  @foreach ($murid as $daftar_murid)
                  <option value="{{$daftar_murid->id}}">{{$daftar_murid->nama}}</option>
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
                    <input type="date" class="form-control" name="tanggal_pinjam" required>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Tanggal Di Kembalikan</label>
                  <div class="input-group has-validation">
                    <input type="date" class="form-control" name="tanggal_di_kembalikan" required>
                  </div>
                </div> 
                {{-- <div class="col-12">
                  <label for="yourUsername" class="form-label">Jumlah Denda <br> <span style="color: yellowgreen">*jika tidak ada denda isikan 0</span></label>
                  <div class="input-group has-validation"> --}}
                    <input type="hidden" readonly class="form-control" name="jumlah_denda" value="0" required>
                  {{-- </div>
                </div>    --}}
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Status</label>
                  <div class="input-group has-validation">
                    <select name="status" id="status" required class="form-select">
                      <option value="" selected disabled style="text-align:center">-- Silahkan Pilih Status Pinjam Buku --</option>
                      <option value="0">Belum Di Kembalikan</option>
                      <option value="1">Sudah Di Kembalikan</option>
                    </select>
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
  {{-- <script>
    $(document).ready(function() {
        $("#createForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("nama", $("#nama").val());
            formData.append("lantai", $("#lantai").val());          
            $.ajax({
                url: '{{ url('admin/pinjam_buku/create') }}',
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
                url: '{{ url('admin/pinjam_buku/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_nama").val(data.nama);
                     $("#edit_lantai").val(data.lantai);
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
            formData.append("lantai", $("#edit_lantai").val());          
            $.ajax({
                url: '{{ url('admin/pinjam_buku/update') }}/' + id,
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
                    url: '{{ url('admin/pinjam_buku/destroy') }}/' + id,
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
</script> --}}
@endsection