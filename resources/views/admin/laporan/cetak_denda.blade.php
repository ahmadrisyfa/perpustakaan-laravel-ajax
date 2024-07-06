
<!DOCTYPE html>
<html>
<head>
  <title>Tabel Cetak Denda Buku</title>
  <style>
    h3{
      margin-left:69px;
      margin-top: 30px;

    }

    table {
      border-collapse: collapse;
      width: 90%;
      margin: 0 auto;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
    <h3>Daftar Data Denda Buku</h3>
    <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Buku</th>
            <th scope="col">Murid Atau Guru</th>          
            <th scope="col">Jumlah Pinjam</th>             
            <th scope="col">Tanggal Pengembalian</th>             
            <th scope="col">Denda Di Bayar</th>             
            <th scope="col">Jumlah Denda</th>             
            {{-- <th scope="col" colspan="2" style="text-align: center">Action</th>              --}}
          </tr>
        </thead>
        <tbody>                      
          @php
            use Carbon\Carbon;
          @endphp
          @foreach ($denda as $value)  
          
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

            {{-- @if ($value['jumlah_denda'] = $denda) --}}
              <tr>
                  <td>{{$loop->iteration}}</td>     
                  <td>{{ $value['buku']['judul'] }}</td>
                  @if ($value['murid']['status'] == 'guru')
                    <td>{{ $value['murid']['nama'] }} (guru)</td> 
                    @else
                    <td>{{ $value['murid']['nama'] }} (murid)</td> 
                  @endif
                  <td>{{$value['jumlah_pinjam']}}</td>    
                  <td>
                    {{ \Carbon\Carbon::parse($value['created_at'])->format('Y-m-d') }}
                    <br>
                    <span style="color:rgb(180, 15, 15);font-weight:bold">
                      Terlambat : {{$cek_selisih}} Hari
                    </span> 
                  </td>

                  <td>
                    Rp. {{ number_format($value['jumlah_denda'], 0, ',', '.') }}
                    <br>
                    @if ($value['jumlah_denda'] == $denda)
                      <span class="btn btn-sm btn-success">Lunas</span>
                    @else
                      <span class="btn btn-sm btn-danger">Belum Lunas</span>

                    @endif
                  </td>

                  <td>
                    Rp. {{ number_format($denda, 0, ',', '.') }}
                  </td>
                                                        
                  
                 
              </tr>  
            {{-- @endif                               --}}
          @endforeach

        </tbody>
      </table>
  <script>
      window.print();
  </script>

</body>
</html>