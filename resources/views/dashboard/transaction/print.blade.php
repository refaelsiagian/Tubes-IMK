<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: Helvetica, Arial, sans-serif; font-size: 12px; }
        h1, h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table, .data-table th, .data-table td { border: 1px solid black; }
        th, td { padding: 4px; text-align: left; }
        .summary { margin-top: 20px; }

        .logo {
            display: block;
            margin: 0 auto;       /* bikin tengah horizontal */
            width: 150px;         /* atur ukuran lebar gambar, sesuaikan */
            height: auto;         /* supaya proporsional */
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table thead tr {
            background-color: #5D4037; /* coklat tua untuk header */
            color: white;
        }

        .data-table tbody tr:nth-child(odd) {
            background-color: #D7CCC8; /* coklat sedang untuk baris ganjil */
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f0e6e2; /* coklat muda untuk baris genap */
        }

        .data-table th, .data-table td {
            padding: 4px;
            text-align: left;
        }

        .print-date {
            text-align: right;
            font-size: 10px;
            margin-bottom: 0px; /* jarak ke tabel */
        }

        .summary {
            width: 50%; /* Atur sesuai lebar yang kamu mau */
            margin-top: 20px;
        }

        .summary th, .summary td {
            padding: 5px 10px;
        }

        .summary th {
            text-align: left;
        }

        .summary td {
            text-align: left;
        }

        .summary, .summary th, .summary td {
            border: none;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('catalogue/images/logo/shabrina.svg') }}" alt="logo" class="logo">
    <h2>Laporan Transaksi</h2>
    <h3>Periode: {{ $monthName }}</h3>

    <div class="print-date">
        Tanggal print: {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Warna</th>
                <th>Jumlah Terjual</th>
                <th>Harga Satuan</th>
                <th>Harga Modal</th>
                <th>Subtotal</th>
                <th>Submodal</th>
                <th>Subprofit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ticketDetails as $detail)
            <tr>
                <td>{{ $detail->item_name }}</td>
                <td>{{ $detail->item_size ?? '-' }}</td>
                <td>{{ $detail->item_colour ?? '-' }}</td>
                <td>{{ $detail->total_quantity }}</td>
                <td>Rp{{ number_format($detail->item_price, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->buying_price, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->total_subtotal, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->total_submodal, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->total_subprofit, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <th>Total Barang Terjual</th>
            <td>: {{ $totalQuantity }}</td>
        </tr>
        <tr>
            <th>Total Penjualan</th>
            <td>: Rp{{ number_format($totalAmount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Modal</th>
            <td>: Rp{{ number_format($totalCost, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Keuntungan</th>
            <td>: Rp{{ number_format($totalProfit, 0, ',', '.') }}</td>
        </tr>
    </table>

</body>
</html>
