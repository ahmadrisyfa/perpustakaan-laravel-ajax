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
        <h5 class="card-title">Data Buku <span>| Tambahkan Data</span></h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
          Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Pengarang</th>          
              <th scope="col">Penerbit</th>             
              <th scope="col">Sampul Buku</th>                                  
              <th scope="col">Action</th>             

            </tr>
          </thead>
          <tbody>
            @foreach ($buku as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->judul}}</td>  
                <td>{{$value->pengarang}}</td>  
                <td>{{$value->penerbit}}</td>                 
                <td><img src="{{asset('storage/' . $value->sampul_buku) }}" style="width: 150px"></td>                     
                <td>
                  <button class="btn btn-sm btn-primary detail-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                    data-bs-target="#detailModal"><i class="bi bi-eye"></i> Detail</button>
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
          <h5 class="modal-title">Tambah Data Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" >
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Judul</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="judul" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Pengarang</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="pengarang" required>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Penerbit</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="penerbit" required>
                  </div>
                </div>     
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Isbn</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="isbn" required>
                  </div>
                </div>  
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Tahun</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="tahun" required>
                  </div>
                </div>  
                <div class="col-12">
                  <img id="preview_sampul_buku" src="#" alt="preview sampul buku" style="display: none;width: 250px; height: auto;margin-top:10px;">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Sampul Buku</label>
                  <input type="file" required class="form-control" onchange="previewSampulBuku()" id="sampul_buku">
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Stok</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="stok" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Rak</label>
                  <div class="input-group has-validation">
                    <Select required class="form-control" id="rak_id">
                      <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Rak --</option>
                        @foreach ($rak as $value)                            
                        <option value="{{$value->id}}">{{$value->nama}}</option>
                        @endforeach
                    </Select>
                  </div>
                </div>  
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Category</label>
                  <div class="input-group has-validation">
                    <Select required class="form-control" id="category_id">
                      <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Category --</option>
                        @foreach ($category as $value)                            
                        <option value="{{$value->id}}">{{$value->nama}}</option>
                        @endforeach
                    </Select>
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
          <h5 class="modal-title">Edit Data Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">            
            <input type="hidden" readonly class="form-control" id="edit_id" required>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Judul</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="edit_judul" required>
              </div>
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Pengarang</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="edit_pengarang" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">Penerbit</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="edit_penerbit" required>
              </div>
            </div>     
            <div class="col-12">
              <label for="yourUsername" class="form-label">Isbn</label>
              <div class="input-group has-validation">
                <input type="number" class="form-control" id="edit_isbn" required>
              </div>
            </div>  
            <div class="col-12">
              <label for="yourUsername" class="form-label">Tahun</label>
              <div class="input-group has-validation">
                <input type="number" class="form-control" id="edit_tahun" required>
              </div>
            </div>  
            <div class="col-12">
              <img id="preview_edit_sampul_buku"alt="Preview" style="width: 250px; height: auto;margin-top:10px;">
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Sampul Buku</label>
              <input type="file" class="form-control" onchange="PreviewEditSampulBuku()" id="edit_sampul_buku">
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Stok</label>
              <div class="input-group has-validation">
                <input type="number" class="form-control" id="edit_stok" required>
              </div>
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Rak</label>
              <div class="input-group has-validation">
                <Select required class="form-control" id="edit_rak_id">
                  <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Rak --</option>
                    @foreach ($rak as $value)                            
                    <option value="{{$value->id}}">{{$value->nama}}</option>
                    @endforeach
                </Select>
              </div>
            </div>  
            <div class="col-12">
              <label for="yourUsername" class="form-label">Category</label>
              <div class="input-group has-validation">
                <Select required class="form-control" id="edit_category_id">
                  <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Category --</option>
                    @foreach ($category as $value)                            
                    <option value="{{$value->id}}">{{$value->nama}}</option>
                    @endforeach
                </Select>
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

  <div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Data Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" readonly class="form-control" id="detail_id" required>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Judul</label>
              <div class="input-group has-validation">
                <input disabled type="text" class="form-control" id="detail_judul" required>
              </div>
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Pengarang</label>
              <div class="input-group has-validation">
                <input disabled type="text" class="form-control" id="detail_pengarang" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">Penerbit</label>
              <div class="input-group has-validation">
                <input disabled type="text" class="form-control" id="detail_penerbit" required>
              </div>
            </div>     
            <div class="col-12">
              <label for="yourUsername" class="form-label">Isbn</label>
              <div class="input-group has-validation">
                <input disabled type="number" class="form-control" id="detail_isbn" required>
              </div>
            </div>  
            <div class="col-12">
              <label for="yourUsername" class="form-label">Tahun</label>
              <div class="input-group has-validation">
                <input disabled type="number" class="form-control" id="detail_tahun" required>
              </div>
            </div>  
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Sampul Buku</label>
              <img id="preview_detail_sampul_buku"alt="Preview" style="width: 250px; height: auto;margin-top:10px;">
            </div>
            {{-- <div class="col-12">
              <label for="inputPassword4" class="form-label">Sampul Buku</label>
              <input disabled type="file" class="form-control" onchange="previewdetailImage()" id="detail_sampul_buku">
            </div> --}}
            <div class="col-12">
              <label for="yourUsername" class="form-label">Stok</label>
              <div class="input-group has-validation">
                <input disabled type="number" class="form-control" id="detail_stok" required>
              </div>
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Rak</label>
              <div class="input-group has-validation">
                <Select required class="form-control" id="detail_rak_id" disabled>
                  <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Rak --</option>
                    @foreach ($rak as $value)                            
                    <option value="{{$value->id}}">{{$value->nama}}</option>
                    @endforeach
                </Select>
              </div>
            </div>  
            <div class="col-12">
              <label for="yourUsername" class="form-label">Category</label>
              <div class="input-group has-validation">
                <Select required class="form-control" id="detail_category_id" disabled>
                  <option value="" style="text-align: center" selected disabled>-- Silahkan Pilih Category --</option>
                    @foreach ($category as $value)                            
                    <option value="{{$value->id}}">{{$value->nama}}</option>
                    @endforeach
                </Select>
              </div>
            </div>  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>

  
  <script>
    function previewSampulBuku() {
      var input = document.getElementById('sampul_buku');
      var preview = document.getElementById('preview_sampul_buku');
  
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
  
        reader.readAsDataURL(input.files[0]);
      }
    }
    function PreviewEditSampulBuku() {
      var input = document.getElementById('edit_sampul_buku');
      var preview = document.getElementById('preview_edit_sampul_buku');
  
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#createForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("judul", $("#judul").val());
            formData.append("pengarang", $("#pengarang").val());
            formData.append("penerbit", $("#penerbit").val());
            formData.append("isbn", $("#isbn").val());
            formData.append("tahun", $("#tahun").val());
            formData.append("sampul_buku", $("#sampul_buku")[0].files[0]); 
            formData.append("stok", $("#stok").val());
            formData.append("rak_id", $("#rak_id").val());
            formData.append("category_id", $("#category_id").val());
            
            $.ajax({
                url: '{{ url('admin/buku/create') }}',
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
                url: '{{ url('admin/buku/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_judul").val(data.judul);
                     $("#edit_pengarang").val(data.pengarang);
                     $("#edit_penerbit").val(data.penerbit);
                     $("#edit_isbn").val(data.isbn);
                     $("#edit_tahun").val(data.tahun);
                     $("#preview_edit_sampul_buku").attr('src', '{{ asset('storage') }}' + '/' +  data.sampul_buku);
                     $("#edit_stok").val(data.stok);
                     $("#edit_rak_id").val(data.rak_id);
                     $("#edit_category_id").val(data.category_id);

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
            formData.append("judul", $("#edit_judul").val());
            formData.append("pengarang", $("#edit_pengarang").val());
            formData.append("penerbit", $("#edit_penerbit").val());
            formData.append("isbn", $("#edit_isbn").val());
            formData.append("tahun", $("#edit_tahun").val());
           // Cek apakah ada file yang dipilih
            var fileInput = document.getElementById('edit_sampul_buku');
            if (fileInput.files.length > 0) {
                formData.append("sampul_buku", fileInput.files[0]);
            }
            formData.append("stok", $("#edit_stok").val());
            formData.append("rak_id", $("#edit_rak_id").val());
            formData.append("category_id", $("#edit_category_id").val());
         
            $.ajax({
                url: '{{ url('admin/buku/update') }}/' + id,
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
                    url: '{{ url('admin/buku/destroy') }}/' + id,
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
        $(document).on('click', '.detail-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin/buku/detail') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#detail_id').val(data.id);
                     $("#detail_judul").val(data.judul);
                     $("#detail_pengarang").val(data.pengarang);
                     $("#detail_penerbit").val(data.penerbit);
                     $("#detail_isbn").val(data.isbn);
                     $("#detail_tahun").val(data.tahun);
                     $("#preview_detail_sampul_buku").attr('src', '{{ asset('storage') }}' + '/' +  data.sampul_buku);
                     $("#detail_stok").val(data.stok);
                     $("#detail_rak_id").val(data.rak_id);
                     $("#detail_category_id").val(data.category_id);

                    },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection