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
        <h5 class="card-title">Data Guru <span>| Tambahkan Data</span></h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
          Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">No Telepon</th> 
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">User</th>
              <th scope="col">Action</th>             
            </tr>
          </thead>
          <tbody>
            @foreach ($guru as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->nama}}</td>  
                <td>{{$value->no_telepon}}</td>                 
                <td>{{$value->alamat}}</td>                 
                <td>{{$value->tanggal_lahir}}</td>                 
                <td>{{$value->jenis_kelamin}}</td>                 
                <td>{{ $value->user->name ?? 'Nama tidak tersedia' }}</td>


              
                <td>
                  <button class="btn btn-info edit-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                    data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</button>
                  <button class="btn btn-danger delete"  data-id="{{ $value->id }}"><i class="bi bi-trash"></i> Hapus</button>
              </td>
            </tr> 
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
          <h5 class="modal-title">Tambah Data Guru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" >
            <input type="hidden" class="form-control" id="status" value="guru" required>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Nama</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="nama" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">No Telepon</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="no_telepon" required>
                  </div>
                </div>  
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Tanggal Lahir</label>
                  <div class="input-group has-validation">
                    <input type="date" class="form-control" id="tanggal_lahir" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Jenis Kelamin</label>
                  <div class="input-group has-validation">
                    <Select required class="form-control" id="jenis_kelamin">
                      <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </Select>
                  </div>
                </div> 
                <div class="col-12">
                  <span style="color: red">*jika data user tidak ada maka sudah di pakai oleh guru lain atau statusnya tidak guru</span><br>
                  <label for="yourUsername" class="form-label">User</label>
                  <div class="input-group has-validation">
                    <Select required class="form-control" id="user_id">
                      <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih User --</option>
                        @foreach ($user as $value)
                            @php
                                $user_id = App\Models\Murid::where('user_id', $value->id)->exists();
                                // Cek sudah ada data user_id atau belum di tabel Guru
                            @endphp
                            @if (!$user_id)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach                    
                    </Select>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Alamat</label>
                  <div class="input-group has-validation">
                    <textarea id="alamat"  rows="5" class="form-control"></textarea>
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
          <h5 class="modal-title">Edit Data Guru</h5>
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
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">No Telepon</label>
                    <div class="input-group has-validation">
                      <input type="number" class="form-control" id="edit_no_telepon" required>
                    </div>
                  </div>  
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Tanggal Lahir</label>
                    <div class="input-group has-validation">
                      <input type="date" class="form-control" id="edit_tanggal_lahir" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Jenis Kelamin</label>
                    <div class="input-group has-validation">
                      <Select required class="form-control" id="edit_jenis_kelamin">
                        <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Jenis Kelamin --</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </Select>
                    </div>
                  </div> 
                  <div class="col-12">
                    {{-- <span style="color: red">*jika data user tidak ada maka sudah di pakai oleh siswa lain</span><br> --}}
                    <span style="color: red">*1 Guru hanya boleh mempunyai 1 user</span> <br>
                    <label for="yourUsername" class="form-label">User</label>
                    <div class="input-group has-validation">
                      <Select required class="form-control" id="edit_user_id">
                        <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih User --</option>
                          @foreach ($user as $value)                            
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach                    
                      </Select>
                    </div>
                  </div> 
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Alamat</label>
                    <div class="input-group has-validation">
                      <textarea id="edit_alamat"  rows="5" class="form-control"></textarea>
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
            formData.append("no_telepon", $("#no_telepon").val());          
            formData.append("alamat", $("#alamat").val());          
            formData.append("tanggal_lahir", $("#tanggal_lahir").val());          
            formData.append("jenis_kelamin", $("#jenis_kelamin").val());          
            formData.append("user_id", $("#user_id").val());          
            formData.append("status", $("#status").val());          


            $.ajax({
                url: '{{ url('admin/guru/create') }}',
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
                url: '{{ url('admin/guru/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_nama").val(data.nama);
                     $("#edit_no_telepon").val(data.no_telepon);
                     $("#edit_alamat").val(data.alamat);
                     $("#edit_tanggal_lahir").val(data.tanggal_lahir);
                     $("#edit_jenis_kelamin").val(data.jenis_kelamin);
                     $("#edit_user_id").val(data.user_id);
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
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("nama", $("#edit_nama").val());
            formData.append("no_telepon", $("#edit_no_telepon").val());          
            formData.append("alamat", $("#edit_alamat").val());          
            formData.append("tanggal_lahir", $("#edit_tanggal_lahir").val());          
            formData.append("jenis_kelamin", $("#edit_jenis_kelamin").val());          
            formData.append("user_id", $("#edit_user_id").val());          
            $.ajax({
                url: '{{ url('admin/guru/update') }}/' + id,
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
                    url: '{{ url('admin/guru/destroy') }}/' + id,
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