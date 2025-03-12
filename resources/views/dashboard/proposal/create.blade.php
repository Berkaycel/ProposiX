@extends('dashboard.layout.master')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Yeni Teklif Oluştur</h4>
                    <form class="form-sample" method="POST" action="{{route('proposals.outbound.store', ['productId' => $product->id])}}">
                        @csrf
                        <p class="card-description">
                            Teklif Sahibinin Bilgileri
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Ad & Soyad:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name" value="{{$user->name}}" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Şirket İsmi:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="company_name" value="{{$user->company_name}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>E-Posta:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Telefon:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Adres:</strong></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="address" rows="2" name="address">{{$user->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Teklif Detayları
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Teklif Ücreti:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Rakam ile:"
                                            name="offer_amount_number" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Teklif Ücreti:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Yazı ile:"
                                            name="offer_amount_text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Son Geçerlilik Tarihi:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="expiration_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Teklif Açıklaması:</strong></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" rows="2" name="offer_description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Ürün Seçimi
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Ürün İsmi:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_name" value="{{$product->name}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Birim Fiyatı:</strong></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="unit_price" value="{{$product->unit_price}}" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Miktar(Adet):</strong></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="quantity" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Ürün Açıklaması:</strong></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="product_description" rows="2" name="product_description" disabled>{{$product->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label class="form-label">Ürünler</label>
                            <select id="productSelect" class="form-control select2" multiple="multiple"
                                name="product_ids[]">
                                @foreach ($products as $product)
                                <option value="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->unit_price}}" data-description="{{$product->description}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group" id="productDetails"></div>
                        <button type="submit" class="btn btn-primary mr-2">Oluştur</button>
                        <a href="{{route('dashboard')}}" class="btn btn-light">İptal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Ürünleri seçin",
                allowClear: true,
                width: '100%'
            });

            let selectedProducts = {};

            $('#productSelect').on('change', function() {
                let selectedOptions = $(this).find(':selected');
                $('#productDetails .product-item').each(function() {
                    let productId = $(this).data('id');
                    let quantity = $(this).find('.quantity').val();
                    selectedProducts[productId] = quantity;
                });

                $('#productDetails').empty();

                selectedOptions.each(function() {
                    let productId = $(this).val();
                    let productName = $(this).data('name');
                    let productPrice = $(this).data('price');
                    let productDesc = $(this).data('description');

                    let savedQuantity = selectedProducts[productId] ? selectedProducts[productId] :
                        1;
                    let total = savedQuantity * productPrice;

                    let productHtml = `
                        <div class="product-item border p-3 mb-2" data-id="${productId}">
                            <h5>${productName}</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Ürün Adı</label>
                                    <input type="text" class="form-control" value="${productName}" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label>Birim Fiyatı</label>
                                    <input type="text" class="form-control" value="${productPrice} ₺" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Açıklama</label>
                                    <input type="text" class="form-control" value="${productDesc}" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label>Teklif Edilen Adet</label>
                                    <input type="number" class="form-control quantity" min="1" value="${savedQuantity}" data-price="${productPrice}">
                                </div>
                                <div class="col-md-2">
                                    <label>Toplam Tutar</label>
                                    <input type="text" class="form-control total-price" value="${total} ₺" disabled>
                                </div>
                            </div>
                            <!-- Hidden input for quantity -->
                            <input type="hidden" name="products[${productId}][id]" value="${productId}">
                            <input type="hidden" name="products[${productId}][quantity]" class="quantity-input" value="${savedQuantity}">
                            <input type="hidden" name="products[${productId}][price]" value="${productPrice}">
                        </div>
                    `;

                    $('#productDetails').append(productHtml);
                });

                $('.quantity').on('input', function() {
                    let price = $(this).data('price');
                    let quantity = $(this).val();
                    let total = price * quantity;
                    $(this).closest('.product-item').find('.total-price').val(total + " ₺");

                    // Update the hidden quantity input
                    let productId = $(this).closest('.product-item').data('id');
                    $(this).closest('.product-item').find('.quantity-input').val(quantity);
                });
            });
        });
    </script> --}}
@endsection
