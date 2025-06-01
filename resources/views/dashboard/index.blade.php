@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Penghasilan <br>Bulan Ini</h6>
                                    <h6 class="font-extrabold mb-0">Rp{{ number_format($data->totalprofit, 0, ',', '.') }}</h6>
                                    <a href="{{ route('transactions.index') }}" class="font-semibold">Selengkapnya ></a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah Transaksi Bulan Ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $data->totaltransaksi }} Transaksi</h6>
                                    <a href="{{ route('transactions.index') }}" class="font-semibold">Selengkapnya ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Barang Terjual <br>Bulan Ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $data->totalquantity }} Item</h6>
                                    <a href="{{ route('transactions.index') }}" class="font-semibold">Selengkapnya ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBag"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Barang Hampir <br>Habis</h6>
                                    <h6 class="font-extrabold mb-0">{{ $lowstock }} Item</h6>
                                    <a href="{{ route('dashboard.stock') }}" class="font-semibold">Selengkapnya ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penghasilan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script>
    fetch('/owner/dashboard/chart')
        .then(response => response.json())
        .then(data => {
            var optionsProfileVisit = {
                annotations: { position: "back" },
                dataLabels: { 
                    enabled: false,
                    formatter: function (val) {
                        return 'Rp ' + val.toLocaleString('id-ID');
                    },
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold'
                    }
                },
                chart: { type: "bar", height: 300 },
                fill: { opacity: 1 },
                series: [{
                    name: "Total Profit",
                    data: data.profits
                }],
                colors: "#435ebe",
                xaxis: {
                    categories: data.categories
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return 'Rp' + val.toLocaleString('id-ID');
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return 'Rp' + val.toLocaleString('id-ID');
                        }
                    }
                }
            };


            var chartProfileVisit = new ApexCharts(
                document.querySelector("#chart-profit"),
                optionsProfileVisit
            );

            chartProfileVisit.render();
        });
</script>
@endsection