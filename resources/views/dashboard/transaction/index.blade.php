@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Transaksi</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4>Pilih Bulan</h4>
                    </div>
                    <div class="card-body">
                        <select id="filter_month" name="filter_month" class="form-select form-size">
                            <option value="">Pilih Bulan</option>
                            @foreach ($dropdown as $option)
                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                            @endforeach
                        </select>

                        @if(request('date'))
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Total Pendapatan</td>
                                            <td>Rp{{ number_format($total_amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Jumlah Transaksi</td>
                                            <td>{{ $tickets->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Rata-rata Nilai Transaksi</td>
                                            <td>Rp165.079</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




@endsection

@section('script')
<script>
document.getElementById('filter_month').addEventListener('change', function() {
    const value = this.value;
    if(value) {
        // Buat query param date=value
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?date=' + encodeURIComponent(value);
        // Update URL tanpa reload halaman
        window.history.pushState({path:newUrl}, '', newUrl);
    } else {
        // Kalau kosong, hilangkan query param date
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.pushState({path:newUrl}, '', newUrl);
    }
});
</script>
@endsection