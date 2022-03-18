<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Order #{{ $order->number }}</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal"><img src="/images/a.png" alt="logo mebel karya utama" width="50" height="50"> CV Mebel Karya Utama</h5> 
        <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/">Beranda</a>
        </nav>
    </div> 
        
        @include('orders.message')
	<div class="container pb-5 pt-5">
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="card shadow">
					<div class="card-header bg-warning">
						<h5>Konfirmasi dan Detail Transaksi</h5> </div>
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
                            <tr>
                                <td>Nama </td>
                                <td><b>:{{ $order->customer_name }}</b></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><b>:{{ $order->customer_email }}</b></td>
                            </tr>
                            <tr>
                                <td>HP</td>
                                <td><b>:{{ $order->customer_phone }}</b></td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td><b>:{{ $order->number }}</b></td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td><b>:{{ $order->item_name }}</b></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><b>:{{ $order->quantity }} Unit </b></td>
                            </tr>
							<tr>
								<td>Total Harga</td>
								<td><b>Rp {{ number_format($order->total_price, 2, ',', '.') }}</b></td>
							</tr>
							<tr>
								<td>Status Pembayaran</td>
								<td><b>
                              @if ($order->payment_status == 1)
                              Menunggu Pembayaran
                              @elseif ($order->payment_status == 2)
                              Sudah Dibayar
                              @else
                              Kadaluarsa
                              @endif
                              </b> </td>
							</tr>
							<tr>
								<td>Tanggal</td>
								<td><b>{{ $order->created_at->format('d M Y H:i') }}</b></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card shadow">
                <div class="card-header">
                    <h5>Unggah Bukti Transfer</h5>
                </div>
                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <input type="file" id="foto"  name="receipt" value="" >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>