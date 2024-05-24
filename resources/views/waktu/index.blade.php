<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
<style>
      @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400&display=swap');

  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  }

  @media screen and (max-width: 768px) {
    /* Tampilan Hp Dll */
  body {
    display: inline;
    place-items: center;
  }

  .clock {
    text-align: center;
    padding: 0;

  }

  .clock1 {
    text-align: center;
    padding: 0;

  }

  .clock .display {
    font-size: 15px;
    margin-left: 20px;
    /* color: #8231D3; */
    color: #01B820;
    font-family: 'inter', sans-serif;
  }

  .clock1 #tampil {
    margin-left: 20px;
    font-size: 8px;
    color: #73879C;
    font-family: 'inter', sans-serif;
  }
  }

  @media screen and (min-width: 768px) {
  /* Tampilan Laptop Dll  */
    body {
        display: inline;
        place-items: center;
    }

    .clock {
        text-align: left;
        padding: 0 30px;

    }

    .clock1 {
        text-align: left;
        padding: 0;

    }

    .clock .display {
        margin-top: 10px;
        font-size: 22px;
        
        /* color: #8231D3; */
        color: #01B820;
        font-family: 'inter', sans-serif;
    }

    .clock1 #tampil {
        margin-bottom: 15px;
        font-size: 12px;
        color: #73879C;
        font-family: 'inter', sans-serif;
    }
  }
</style>
  </head>
  <body>    
  
    <div class="clock">  
      <div class="display"></div>
        <div class="clock1">
          <div id="tampil"></div>
        </div>
    </div>
<script>
          setInterval(function(){
            const clock = document.querySelector(".display");
            let time = new Date();
            let sec = time.getSeconds();
            let min = time.getMinutes();
            let hr = time.getHours();
            let day = 'AM';
            if(hr > 12){
              day = 'PM';
              hr = hr - 12;
            }
            if(hr == 0){
              hr = 12;
            }
            if(sec < 10){
              sec = '0' + sec;
            }
            if(min < 10){
              min = '0' + min;
            }
            if(hr < 10){
              hr = '0' + hr;
            }
            clock.textContent = hr + ':' + min + ':' + sec + " " + day;
          });
          var date = new Date();
    var tahun = date.getFullYear();
    var bulan = date.getMonth();
    var tanggal = date.getDate();
    var hari = date.getDay();
    var jam = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    switch(hari) {
    case 0: hari = "Minggu"; break;
    case 1: hari = "Senin"; break;
    case 2: hari = "Selasa"; break;
    case 3: hari = "Rabu"; break;
    case 4: hari = "Kamis"; break;
    case 5: hari = "Jum'at"; break;
    case 6: hari = "Sabtu"; break;
    }
    switch(bulan) {
    case 0: bulan = "Januari"; break;
    case 1: bulan = "Februari"; break;
    case 2: bulan = "Maret"; break;
    case 3: bulan = "April"; break;
    case 4: bulan = "Mei"; break;
    case 5: bulan = "Juni"; break;
    case 6: bulan = "Juli"; break;
    case 7: bulan = "Agustus"; break;
    case 8: bulan = "September"; break;
    case 9: bulan = "Oktober"; break;
    case 10: bulan = "November"; break;
    case 11: bulan = "Desember"; break;
    }
    var tampilTanggal = hari + ", " + tanggal + " " + bulan + " " + tahun;
    
        document.getElementById("tampil").innerHTML = tampilTanggal;
</script>

  </body>
</html>
