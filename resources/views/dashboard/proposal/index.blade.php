@extends('dashboard.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tekliflerim</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Teklif Verilen</th>
                                    <th>Teklif Ücreti</th>
                                    <th>Ürün İsmi</th>
                                    <th>Ürün Adedi</th>
                                    <th>Durum</th>
                                    <th>Son Geçerlilik Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proposals as $proposal)
                                    <tr>
                                        <td>{{ $proposal->id }}</td>
                                        <td>{{ \App\Models\User::find($proposal->receiver_id)->name }}</td>
                                        <td>{{ $proposal->total }}</td>
                                        <td>{{ \App\Models\Product::find($proposal->product_id)->name }}</td>
                                        <td>{{ $proposal->quantity }}</td>
                                        <td>{{ $proposal->status }}</td>
                                        <td>{{ $proposal->last_valid_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
