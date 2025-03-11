@extends('dashboard.layout.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Yeni Ürün Ekle</h4>
                <form class="forms-sample" method="POST" action="{{route('product.create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ürün Adı</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ürün Adı:" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Stok Sayısı</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Stok Sayısı:" value="{{old('quantity')}}">
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Birim Fiyatı</label>
                        <input type="decimal" class="form-control" name="unit_price" id="unit_price" placeholder="Birim Fiyatı:" value="{{old('unit_price')}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Satış Durumu</label>
                        <select class="form-control" id="status" name="status">
                            <option value="ON_SALE" selected>Satışta</option>
                            <option value="NOT_FOR_SALE">Satışa Kapalı</option>
                            <option value="PENDING">Beklemede</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Ürün Açıklaması</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Oluştur</button>
                    <a href="{{route('product.index')}}" class="btn btn-light">İptal</a>
                </form>
                
            </div>
            <div class="card-body">
                @include('dashboard.errors.errors')
            </div>
        </div>
    </div>
@endsection
