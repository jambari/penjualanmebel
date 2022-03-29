<!DOCTYPE html>
<html>

<head>
    <title>CV Mebel Karya Utama</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <style>
        html {
            font-size: 14px;
        }
        
        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }
        
        .container {
            max-width: 960px;
        }
        
        .pricing-header {
            max-width: 700px;
        }
        
        .card-deck .card {
            min-width: 220px;
        }
        
        .border-top {
            border-top: 1px solid #e5e5e5;
        }
        
        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }
        
        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
        
    </style>
</head>

<body>
    <!-- Top menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="/images/a.png" alt="logo mebel karya utama" width="50" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
@if (Route::has('login')) @auth
    <ul class="navbar-nav justify-content-end">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          {{ ucfirst(Auth::user()->name) }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">
                          <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">Customer</a>
      </li>
    </ul>
@endauth @endif
  </div>
</nav>
<br>
    
    <!-- !PAGE CONTENT! -->
    <div class="container-md" style="">
        <!-- First Photo Grid-->
        <div class="row" id="food"> 
        @if ( $items ) @foreach ( $items as $item ) 
      <div class="col-sm"> 
        <div class="card" style="width: 18rem; height: 25rem;">
          <img src="{{ asset("storage/$item->image") }}" alt="{{ $item->name ?? '' }}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">{{ ucfirst($item->name ?? '') }}</p>
            <button type="button" class="btn btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal"> Detail </button>
          </div>
        </div>
                <!-- <button class="btn btn-light ">Rp {{ number_format($item->price, 2, ',', '.') }}</button>  --> 
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                        <p>
                          <a class="btn btn-danger" data-toggle="collapse" href="#deskripsi" role="button" aria-expanded="false" aria-controls="deskripsi">
                            Deskripsi Produk
                          </a>
                          <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#kustom" aria-expanded="false" aria-controls="kustom">
                            Kustom Produk
                          </button>
                        </p>
                        <div class="collapse" id="deskripsi">
                          <div class="card card-body">
                            <ul class="list-group">
                              <li class="list-group-item">{{ ucfirst($item->name ?? '') }}</li>
                              <li class="list-group-item">Ukuran : {{ $item->dimention ?? '' }}</li>
                              <li class="list-group-item">Stok : {{ $item->stock ?? '' }}</li>
                              <li class="list-group-item">Deskripsi : {{ $item->description ?? '' }}</li>
                              <li class="list-group-item">Harga : Rp {{ number_format($item->price, 2, ',', '.') }}</li>
                              <li class="list-group-item">
                              @if (Route::has('login')) @auth <a href="{{ url('/order/beli/$item->id') }}" class="btn btn-danger btn-block">PESAN</a> @else <a href="{{ route('login') }}" class="btn btn-danger">Log in</a> @if (Route::has('register')) <a href="{{ route('register') }}" class="p-2 text-dark">Register</a> @endif @endauth @endif
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="collapse" id="kustom">
                          <div class="card card-body">
                          @if (Route::has('login')) 
                          @auth 
                           <form action="{{ action('App\Http\Controllers\OrderController@store') }}" method="post" id="myform"> {{ csrf_field() }}
                                <fieldset>
                                    <legend></legend>
                                    <div class="row">
                                        <div class="col-md-12"> @if ($errors->any()) <div class="alert alert-danger">
                                                <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                                            </div> @endif <div class="form-group"> <label for="name">Nama Lengkap</label> <input class="form-control @if($errors->has('nama')) border border-danger @endif " type="text" id="name" name="name" placeholder="nama lengkap" required /> </div>
                                            <div class="form-group"> <label for="email">Email</label> <input name="email" class="form-control @if($errors->has('email')) border border-danger @endif" type="email" id="email" placeholder="Email" required /> </div>
                                            <div class="form-group"> <label for="phone">Nomor HP</label> <input name="phone" class="form-control @if($errors->has('phone')) border border-danger @endif" type="text" id="phone" placeholder="Nomor Handphone" required /> </div>
                                            <div class="form-group"> <label for="type">Pilih jenis mebel</label> <select name="type" class="form-control" id="type" required>
                                                    <option value="pintu">Pintu</option>
                                                    <option value="lemari">Lemari</option>
                                                    <option value="meja">Meja</option>
                                                    <option value="kursi">Kursi</option>
                                                </select> </div>
                                            <div class="form-group"> <label for="quantity">Jumlah</label> <input name="quantity" class="form-control " type="text" id="phone" placeholder="1" value="1" required /> </div>
                                            <div class="form-group"> <label for="length">Panjang (cm)</label> <input name="length" class="form-control " type="text" id="length" placeholder="0" value="0" required /> </div>
                                            <div class="form-group"> <label for="width">Lebar (cm)</label> <input name="width" class="form-control " type="text" id="width" placeholder="0" value="0" required /> </div>
                                            <div class="form-group"> <label for="height">Tinggi (cm)</label> <input name="height" class="form-control " type="text" id="height" placeholder="0" value="0" /> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> <input type="submit" value="Submit" class="btn btn btn-outline-primary btn-lg btn-block"> </div>
                                    </div>
                                </fieldset>
                            </form>                          
                          @else <a href="{{ route('login') }}" class="btn btn-danger">Log in</a> @if (Route::has('register')) <a href="{{ route('register') }}" class="p-2 text-dark">Register</a> @endif @endauth @endif
 
                          </div>
                        </div>
                        </div>
                        <div class="modal-footer"> <button type="button" class="btn btn btn-outline-danger btn-block" data-dismiss="modal">Batal</button> </div>
                    </div>
                </div>
            </div>
                
            </div> @endforeach @endif </div> <br> <br>  
        
        <!-- Pagination -->
        <div class="row">
            <div class="col-sm"> {{ $items->links() }} </div>
        </div>
        <hr> @include('orders.message')
        <!-- About Section -->
        <div class="container-fluid">
            <!-- Button trigger modal -->  <!-- Modal -->

        </div>
        <hr>
        <p class="text-center"> &copy; CV Mebel Karya Utama 2022 </p> <!-- End page content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        // Script to open and close sidebar
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>