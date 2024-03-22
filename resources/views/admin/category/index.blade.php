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
        <h5 class="card-title">Data Category <span>| Tambahkan Data</span></h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>                         
              <th scope="col">Action</th>                         
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->nama}}</td>                      
                <td>
                    <button class="btn btn-sm btn-info edit-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                      data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn btn-sm btn-danger delete"  data-id="{{ $value->id }}"><i class="bi bi-trash"></i> Hapus</button>

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
          <h5 class="modal-title">Tambah Data Category</h5>
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
          <h5 class="modal-title">Edit Data Category</h5>
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
                url: '{{ url('admin/category/create') }}',
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
                url: '{{ url('admin/category/edit') }}/' + id,
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
                url: '{{ url('admin/category/update') }}/' + id,
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
                    url: '{{ url('admin/category/destroy') }}/' + id,
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