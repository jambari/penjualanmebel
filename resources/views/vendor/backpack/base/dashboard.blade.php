@extends(backpack_view('blank'))

@php
  $breadcrumbs = [
      trans('backpack::crud.admin') => backpack_url('dashboard'),
      trans('backpack::base.dashboard') => false,
  ];
@endphp

@section('content')

<div class="container-fluid">

  <div class="row">
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center"><i class="fa fa-server bg-primary p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary"> {{ $totalorder ?? '' }} </div>
                    <div class="text-muted text-uppercase font-weight-bold small">Pemesanan</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center"><i class="fa fa-exchange bg-info p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $pending ?? '' }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Menunggu</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center"><i class="fa fa-check-square-o bg-success p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $paid ?? '' }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Dibayar</div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center"><i class="fa fa-eraser bg-danger p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $expired ?? '' }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Kadaluarsa</div>
                </div>
                </div>
            </div>
        </div>
  </div> 
  <!-- end row -->
</div>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="card-columns cols-2">
            <div class="card">
                <div class="card-header">Jumlah Item
                    <div class="card-header-actions"></div>
                </div>
                <div class="card-body">
                    <div class="chart-wrapper">
                        <canvas id="item"></canvas>
                    <script>
                        new Chart(document.getElementById("item"), {
                        type: 'bar',
                        data: {
                        labels: ["Kursi", "Meja", "Lemari", "Pintu"],
                        datasets: [
                            {
                            label: "Jumlah per item",
                            backgroundColor: ["#1C0A00", "#361500","#603601","#CC9544"],
                            data: [ 10 ,8, 6, 2 ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Siap jual'
                        }
                        }
                    });
                    </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Penjualan per bulan
                    <div class="card-header-actions"></div>
                </div>
                <div class="card-body">
                    <div class="chart-wrapper">
                        <canvas id="item2"></canvas>
                    <script>
                    new Chart(document.getElementById("item2"), {
                        type: 'line',
                        data: {
                            labels: [
      
                                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
                            ],
                            datasets: [{ 
                                data: [
 
                                    3,4,2,1,0,5,1,6,2,8,2,10
                                ],
                                label: "Item terjual",
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ]
                        },
                        options: {
                            title: {
                            display: true,
                            text: 'Item terjual per bulan'
                            }
                        }
                        });
                </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

