@extends('dashboard.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Hoş Geldin {{ \Illuminate\Support\Facades\Auth::user()->name }}!</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">En Yeni Ürünler</p>
                    <ul class="icon-data-list list-unstyled">
                        @if ($newestProducts->count() > 0)
                            @foreach ($newestProducts as $product)
                                <li class="card mb-3 border border-primary shadow-sm">
                                    <div class="d-flex p-3">
                                        <div>
                                            <p class="text-info mb-1">{{ $product->name }}</p>
                                            <p class="mb-0">{{ $product->description }}</p>
                                            <p class="mb-0"><strong>Birim Fiyatı:</strong> {{ $product->unit_price }} TL
                                            </p>
                                            <div class="template-demo mt-2">
                                                <button type="button" class="btn btn-success btn-icon-text">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Teklif Ver
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="card mb-3">
                                <div>
                                    <p>Herhangi bir ürün bulunamadı!</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">En Çok Teklif Verilen Ürünler</p>
                    <ul class="icon-data-list list-unstyled">
                        @if ($topOfferedProducts->count() > 0)
                            @foreach ($topOfferedProducts as $product)
                                <li class="card mb-3 border border-primary shadow-sm">
                                    <div class="d-flex p-3">
                                        <div>
                                            <p class="text-info mb-1">{{ $product->name }}</p>
                                            <p class="mb-0">{{ $product->description }}</p>
                                            <p class="mb-0"><strong>Birim Fiyatı:</strong> {{ $product->unit_price }} TL
                                            </p>
                                            <div class="template-demo mt-2">
                                                <button type="button" class="btn btn-success btn-icon-text">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Teklif Ver
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="card mb-3">
                                <div>
                                    <p>Herhangi bir ürün bulunamadı!</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tekliflerden En Çok Kabul Edilenler</p>
                    <ul class="icon-data-list list-unstyled">
                        @if ($topFiveProductsOfAcceptedOffer->count() > 0)
                            @foreach ($topFiveProductsOfAcceptedOffer as $product)
                                <li class="card mb-3 border border-primary shadow-sm">
                                    <div class="d-flex p-3">
                                        <div>
                                            <p class="text-info mb-1">{{ $product->name }}</p>
                                            <p class="mb-0">{{ $product->description }}</p>
                                            <p class="mb-0"><strong>Birim Fiyatı:</strong> {{ $product->unit_price }} TL
                                            </p>
                                            <div class="template-demo mt-2">
                                                <button type="button" class="btn btn-success btn-icon-text">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    Teklif Ver
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="card mb-3">
                                <div>
                                    <p>Herhangi bir ürün bulunamadı!</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="productTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Ürün Adı</th>
                                    <th>Birim Fiyatı</th>
                                    <th>Ürün Açıklaması</th>
                                    <th>Teklif Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('product.getOtherProducts') }}',
                    method: 'GET',
                    data: function(d) {
                        d.page = d.start / d.length + 1; 
                        d.limit = d.length;
                    },
                    dataSrc: function(json) {
                        $('#pagination').html(
                            'Toplam: ' + json.pagination.total + ' ürün, Sayfa: ' +
                            json.pagination.current_page + '/' + json.pagination.last_page
                        );
                        return json.data;
                    }
                },
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'unit_price'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="btn btn-primary offer-button" data-id="${row.id}">Teklif Ver</button>`;
                        }
                    }
                ],
                language: {
                    "sProcessing": "İşleniyor...",
                    "sLengthMenu": "_MENU_ kayıt göster",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arası görüntüleniyor",
                    "sInfoEmpty": "Kayıt bulunamadı",
                    "sInfoFiltered": "(toplam _MAX_ kayıttan filtrelenmiş)",
                    "sSearch": "Ara:",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sPrevious": "Önceki",
                        "sNext": "Sonraki",
                        "sLast": "Son"
                    }
                },
                responsive: true, 
                paging: true,
                pageLength: 5,
                autoWidth: false, 
                order: [
                    [0, 'desc']
                ], 
            });

            $('#productTable').on('click', '.offer-button', function() {
                var productId = $(this).data('id');
                alert('Teklif vermek için ürün ID: ' + productId);
            });
        });
    </script>
@endsection
