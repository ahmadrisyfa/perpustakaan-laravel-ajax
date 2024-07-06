
<!DOCTYPE html>
<html>
<head>
  <title>Tabel Cetak Pengembalian Buku</title>
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
    <h3>Daftar Data Pengembalian Buku</h3>
    <table>
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Buku</th>
            <th scope="col">Murid Atau Guru</th>          
            <th scope="col">Jumlah Pinjam</th>             
            <th scope="col">Tanggal Pinjam</th>             
            <th scope="col">Batas Di Kembalikan</th>             
            <th scope="col">Tanggal Pengembalian</th>             
            <th scope="col">Status</th>             
            {{-- <th scope="col">Action</th>              --}}
          </tr>
        </thead>
        <tbody>
          @php
            use Carbon\Carbon;
          @endphp
          @foreach ($pengembalian_buku as $value)                
          <tr>
              <td>{{$loop->iteration}}</td>     
              <td>{{ $value['buku']['judul'] }}</td>
              @if ($value['murid']['status'] == 'guru')
                <td>{{ $value['murid']['nama'] }} (guru)</td> 
                @else
                <td>{{ $value['murid']['nama'] }} (murid)</td> 
              @endif
              <td>{{$value['jumlah_pinjam']}}</td>                
              <td>{{$value['tanggal_pinjam']}}</td>                
              <td>{{$value['tanggal_di_kembalikan']}}</td>  
              <td style="color:orange">{{ \Carbon\Carbon::parse($value['created_at'])->format('Y-m-d') }}</td>
            
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

                  
                <td>
                  @if ($value['jumlah_denda'] < $denda)
                    <button class="btn btn-danger btn-sm">Menunggak</button>                                          
                  @else
                    <button class="btn btn-success btn-sm">Selesai</button>
                  @endif
                </td>
              
          </tr> 

        
          @endforeach

        </tbody>
    </table>

  <script>
      window.print();
  </script>

</body>
</html>