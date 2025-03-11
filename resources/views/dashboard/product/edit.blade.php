@extends('dashboard.layout.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ürün Bilgisi Düzenle</h4>
                <form class="forms-sample" method="POST" action="{{ route('product.update', ['productId' => $product->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Ürün Adı</label>
                        <input type="text" class="form-control" name="name" placeholder="Ürün Adı:"
                            value="{{ $product->name }}">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Stok Sayısı</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Stok Sayısı:"
                            value="{{ $product->quantity }}">
                    </div>

                    <div class="form-group">
                        <label for="unit_price">Birim Fiyatı</label>
                        <input type="number" step="0.01" class="form-control" name="unit_price"
                            placeholder="Birim Fiyatı:" value="{{ $product->unit_price }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Satış Durumu</label>
                        <select class="form-control" name="status">
                            <option value="ON_SALE" {{ $product->status == 'ON_SALE' ? 'selected' : '' }}>Satışta</option>
                            <option value="NOT_FOR_SALE" {{ $product->status == 'NOT_FOR_SALE' ? 'selected' : '' }}>Satışa
                                Kapalı</option>
                            <option value="PENDING" {{ $product->status == 'PENDING' ? 'selected' : '' }}>Beklemede</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Ürün Açıklaması</label>
                        <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                    <a href="{{ route('product.index') }}" class="btn btn-light">İptal</a>
                </form>

            </div>
            <div class="card-body">
                @include('dashboard.errors.errors')
            </div>
        </div>
    </div>
@endsection
