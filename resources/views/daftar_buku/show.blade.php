<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | Daftar Buku</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="{{asset('template-pinterest')}}/docs/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('template-pinterest')}}/docs/assets/css/theme.css">
    <link rel="shortcut icon" href="{{asset('template-pinterest')}}/docs/assets/img/logo.png" type="image/x-icon">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
				<a class="navbar-brand font-weight-bolder mr-3" href="{{url('daftar_buku')}}"><img src="{{asset('template-pinterest')}}/docs/assets/img/logo.png"></a>
				<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
		<div class="collapse navbar-collapse" id="navbarsDefault">
					<ul class="navbar-nav mr-auto align-items-center">
						<h3>
							<a href="{{url('daftar_buku')}}">
									Perpustakaan
							</a>
						</h3>
					</ul>
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('daftar_buku')}}">Daftar Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Landing Page</a>
                        </li>
                        @auth
                            @if (auth()->user()->is_admin == 1)
                                <a class="nav-link" href="{{url('admin/dashboard')}}">Dashboard</a>					
                            @else							
                                <a class="nav-link" href="{{url('siswa/dashboard')}}">Dashboard</a>
                            @endif
                        @else		
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/login')}}">Login</a>
                            </li>
                        @endauth
                           
                    </ul>
		</div>
    </nav>    
    <main role="main">
        <section class="mt-4 mb-5">
            <div class="container mb-4">
                <h3 class="font-weight-bold title">Detail Buku</h3>
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
                        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExplore">
                            <ul class="navbar-nav">
                                <li class="nav-item">    				
                                    <form action="{{ url('daftar_buku/search') }}" method="GET">
                                    <div class="input-group mb-3">
                                            <input name="search" value="{{ request('search') }}" type="text" class="mt-4 form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Search Judul / Pengarang" autocomplete="off">
                                            <div class="input-group-append">
                                            <button class="btn btn-outline-danger mt-4" type="submit">Cari</button>
                                            </div>
                                        </div>	
                                    </form>
                                </li>    				
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
        <section class="bg-gray200 pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <article class="card">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="card-img-top mb-2" src="{{asset('storage/'.$buku_detail->sampul_buku)}}" alt="sampul buku depan">
                                <div class="carousel-caption d-none d-md-block">
                                   <h5 style="font-weight: bold;color:black">Sampul Buku Depan</h5>
                                </div>                                
                              </div>
                              <div class="carousel-item">
                                <img class="card-img-top mb-2" src="{{asset('storage/'.$buku_detail->sampul_buku_belakang)}}" alt="sampul buku belakang">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 style="font-weight: bold;color:black">Sampul Buku Belakang</h5>
                                </div> 
                              </div>                              
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    {{-- <img class="card-img-top mb-2" src="{{asset('storage/'.$buku_detail->sampul_buku)}}" alt="Card image"> --}}
                    <div class="card-body">
                        <h1 class="card-title display-4 text-center" style="font-family:Courier;text-transform:capitalize">
                        {{$buku_detail->judul}} </h1>
                        <div class="container text" style="font-family:Courier;text-transform:capitalize">
                            <b>

                            <div class="row">
                                <div class="col-5">Pengarang</div>
                                <div class="col-7">: {{$buku_detail->pengarang}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Penerbit</div>
                                <div class="col-7">: {{$buku_detail->penerbit}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Isbn</div>
                                <div class="col-7">: {{$buku_detail->isbn}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Tahun</div>
                                <div class="col-7">: {{$buku_detail->tahun}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Stok</div>
                                <div class="col-7">: {{$buku_detail->stok}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Nama Rak</div>
                                <div class="col-7">: {{$buku_detail->rak->nama}} Lantai {{$buku_detail->rak->lantai}}</div>
                            </div>
                            <div class="row">
                                <div class="col-5">Nama Categoy</div>
                                <div class="col-7">: {{$buku_detail->category->nama}}</div>
                            </div>
                        </b>

                        </div>
                        
                    </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row">
                <h5 class="font-weight-bold">Buku Yang Mungkin Anda Suka</h5>
                <div class="card-columns">
                    @foreach ($buku as $value)					
                    <div class="card card-pin" style="text-transform:capitalize">
                        <img class="card-img" src="{{asset('storage/'.$value->sampul_buku)}}">
                        <div class="overlay">
                            <h2 class="card-title title">{{$value->judul}}</h2>
                            <div class="more">
                                <a href="{{url('daftar_buku/show/'.$value->id)}}">
                                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Detail Lengkap....</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        </section>
            
        </main>

    <script src="{{asset('template-pinterest')}}/docs/assets/js/app.js"></script>
    <script src="{{asset('template-pinterest')}}/docs/assets/js/theme.js"></script>
    
       
</body>
    
</html>
