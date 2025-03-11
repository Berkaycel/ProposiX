@extends('dashboard.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ürünlerim</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Ürün Adı</th>
                                    <th>Stok Sayısı</th>
                                    <th>Birim Fiyatı</th>
                                    <th>Açıklama</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }} <strong>Adet</strong></td>
                                        <td>{{ $product->unit_price }} <strong>TL</strong></td>
                                        <td>{{ $product->description }}</td>
                                        @php
                                            $badgeClass = 'badge-danger';

                                            if ($product->status == 'ON_SALE') {
                                                $badgeClass = 'badge-success';
                                            } elseif ($product->status == 'PENDING') {
                                                $badgeClass = 'badge-warning';
                                            }
                                        @endphp
                                        <td><label class="badge {{ $badgeClass }}">{{ $product->status_label }}</label>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{ route('product.edit', ['productId' => $product->id]) }}"
                                                        class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="{{ route('product.deactivate', ['productId' => $product->id]) }}"
                                                        class="btn btn-danger {{ $product->status == 'NOT_FOR_SALE' ? 'disabled' : '' }}" onclick="return confirmDelete(event, this)">
                                                        <i class="bi bi-x-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="template-demo">
                        <a href="{{route('product.create')}}" class="btn btn-primary">Yeni Ürün Oluştur +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(event, element) {
            event.preventDefault();
            if (confirm("Bu ürünü satışa kapatmak istediğinizden emin misiniz?")) {
                window.location.href = element.href;
            }
        }
    </script>
@endsection
