@extends('dashboard.layout.main')

@section('style')
{{-- <style>
    #item-table th,
    #item-table td {
        white-space: nowrap;
        min-width: 120px;
    }
</style> --}}

<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
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
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-light-success color-success alert-dismissible fade show mb-3">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-striped table-hover" id="table1" style="min-width: 800px; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Warna</th>
                                    <th>Size</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                @php
                                    $itemDetails = $details->has($item->id) ? $details[$item->id] : collect();
                                    $itemColours = $itemDetails->pluck('colour')->filter()->unique();
                                    $itemSizes = $itemDetails->pluck('size')->filter()->unique();
                                @endphp
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>
                                        @if ($itemColours->count() > 0)
                                            <select class="form-select form-colour" data-item-id="{{ $item->id }}">
                                                <option value="" disabled selected>Pilih Warna</option>
                                                @foreach ($itemColours as $colour)
                                                    <option value="{{ $colour }}">{{ $colour }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($itemSizes->count() > 0)
                                            <select class="form-select form-size" data-item-id="{{ $item->id }}">
                                                <option value="" disabled selected>Pilih Size</option>
                                                @foreach ($itemSizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->selling_price, 0, ',', '.') }}</td>
                                    <td class="td-stock" data-item-id="{{ $item->id }}"> 
                                        @if ($itemColours->count() === 0 && $itemSizes->count() === 0)
                                            {{-- Tidak ada varian, langsung tampilkan stok --}}
                                            @php
                                                $stock = $itemDetails->first()?->stock ?? '-';
                                            @endphp
                                            <span class="stock-value">{{ $item->details[0]->stock }}</span>
                                        @else
                                            <span class="stock-value">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-quantity" data-item-id="{{ $item->id }}" placeholder="Jumlah" min="1">
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-add-item" data-item-id="{{ $item->id }}" data-item-name="{{ $item->item_name }}" data-item-price="{{ $item->selling_price }}"><i class="bi bi-plus-circle"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Form Hidden di Bawah -->
                        <form id="addItemForm" action="{{ route('tickets.addItem') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <input type="hidden" name="item_id">
                            <input type="hidden" name="item_name">
                            <input type="hidden" name="item_price">
                            <input type="hidden" name="item_colour">
                            <input type="hidden" name="item_size">
                            <input type="hidden" name="item_quantity">
                        </form>

                        
                        <div class="row mt-3">
                            <div class="col-md-12 text-end">
                                <h6>{{ $totalQuantity ?? 0 }} Item</h6>
                                <h4>Total: Rp {{ number_format($totalPrice ?? 0, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-md-12 text-end">
                                <a href="{{ route('tickets.index') }}" class="btn btn-primary">Kembali ke Daftar Belanja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateStock(itemId) {
        const colour = document.querySelector(`select.form-colour[data-item-id="${itemId}"]`)?.value;
        const size = document.querySelector(`select.form-size[data-item-id="${itemId}"]`)?.value;

        fetch(`/get-stock?item_id=${itemId}&colour=${encodeURIComponent(colour ?? '')}&size=${encodeURIComponent(size ?? '')}`)
            .then(response => response.json())
            .then(data => {
                const stockElement = document.querySelector(`.td-stock[data-item-id="${itemId}"] .stock-value`);
                stockElement.textContent = data.stock;
            });
    }

    // Update stock saat select diubah
    document.querySelectorAll('select.form-colour, select.form-size').forEach(select => {
        select.addEventListener('change', function() {
            const itemId = this.dataset.itemId;
            updateStock(itemId);
        });
    });

    // Validasi stok saat tambah item
    document.querySelectorAll('.btn-add-item').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const itemId = this.dataset.itemId;
            const itemName = this.dataset.itemName;
            const itemPrice = this.dataset.itemPrice;

            const colour = document.querySelector(`select.form-colour[data-item-id="${itemId}"]`)?.value || '';
            const size = document.querySelector(`select.form-size[data-item-id="${itemId}"]`)?.value || '';
            const quantity = document.querySelector(`input.form-quantity[data-item-id="${itemId}"]`)?.value || '';

            const stockText = document.querySelector(`.td-stock[data-item-id="${itemId}"] .stock-value`)?.textContent || '0';
            const stock = parseInt(stockText) || 0;

            const showToast = (message) => {
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#f44336",
                    stopOnFocus: true,
                }).showToast();
            };

            if (document.querySelector(`select.form-colour[data-item-id="${itemId}"]`) && !colour) {
                showToast('Pilih warna terlebih dahulu.');
                return;
            }

            if (document.querySelector(`select.form-size[data-item-id="${itemId}"]`) && !size) {
                showToast('Pilih size terlebih dahulu.');
                return;
            }

            if (!quantity || quantity <= 0) {
                showToast('Masukkan jumlah barang.');
                return;
            }

            if (quantity > stock) {
                showToast(`Jumlah melebihi stok. Stok tersedia: ${stock}`);
                return;
            }

            // Kirim form (atau AJAX sesuai logika kamu)
            const form = document.getElementById('addItemForm');
            form.querySelector('input[name="item_id"]').value = itemId;
            form.querySelector('input[name="item_name"]').value = itemName;
            form.querySelector('input[name="item_price"]').value = itemPrice;
            form.querySelector('input[name="item_colour"]').value = colour;
            form.querySelector('input[name="item_size"]').value = size;
            form.querySelector('input[name="item_quantity"]').value = quantity;

            form.submit();
        });
    });
});

</script>





@endsection