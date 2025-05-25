@extends('dashboard.layout.main')

@section('style')
<style>
    #item-table th,
    #item-table td {
        white-space: nowrap;
        min-width: 120px;
    }
</style>
@endsection

@section('content')

<div class="page-heading">
    <h3>Tambahkan Belanjaan</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" placeholder="Cari..">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Warna</th>
                                        <th>Size</th>
                                        <th>Harga</th>
                                        <th>Masukkan Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                                                        @php
                                        // Ambil details untuk item ini
                                        $itemDetails = $details->has($item->id) ? $details[$item->id] : collect();

                                        // Ambil warna unik
                                        $itemColours = $itemDetails->pluck('colour')->filter()->unique();

                                        // Ambil size unik
                                        $itemSizes = $itemDetails->pluck('size')->filter()->unique();
                                    @endphp
                                    <tr>
                                        <form action="{{ route('tickets.addItem') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                                            <input type="hidden" name="item_name" value="{{ $item->item_name }}">
                                            <input type="hidden" name="item_price" value="{{ $item->selling_price }}">

                                            <td>{{ $item->item_name }}</td>
 {{-- Dropdown warna --}}
                                            <td>
                                                @if ($itemColours->count() > 0)
                                                    <select name="item_colour" class="form-select" required>
                                                        @foreach ($itemColours as $colour)
                                                            <option value="{{ $colour }}">{{ $colour }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="hidden" name="item_colour" value="">
                                                    -
                                                @endif
                                            </td>

                                            {{-- Dropdown size --}}
                                            <td>
                                                @if ($itemSizes->count() > 0)
                                                    <select name="item_size" class="form-select" required>
                                                        @foreach ($itemSizes as $size)
                                                            <option value="{{ $size }}">{{ $size }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="hidden" name="item_size" value="">
                                                    -
                                                @endif
                                            </td>

                                            <td>{{ number_format($item->selling_price, 0, ',', '.') }}</td>

                                            <td>
                                                <input type="number" name="item_quantity" class="form-control" placeholder="Jumlah" min="1" required>
                                            </td>

                                            <td>
                                                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-end">
                                <h6>{{ $totalQuantity ?? 0 }} Item</h6>
                                <h4>Total: Rp {{ number_format($totalPrice ?? 0, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-md-12 text-end">
                                <a href="{{ route('tickets.index', ['ticket_id' => $ticket->id]) }}" class="btn btn-primary">Kembali ke Daftar Belanja</a>
                            </div>
                            <div class="mt-3">
                                {{ $items->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
