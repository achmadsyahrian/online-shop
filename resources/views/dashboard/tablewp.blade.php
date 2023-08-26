@extends('dashboard.layouts.main')
@section('container')
    <h1>Barang Menggunakan WP</h1>
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-11 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                @php
                                    $bobotVald = [];
                                @endphp
                                @foreach ($bobot as $bobotItem)
                                    <tr>
                                        <td>{{ $bobotItem->nama }}</td>
                                        <td>{{ $bobotItem->bobot }}</td>
                                        <td>{{ number_format($bobotItem->bobot / $sumBobot, 3) }}</td>
                                    </tr>

                                    @php
                                        array_push($bobotVald, $bobotItem->bobot / $sumBobot);
                                    @endphp
                                @endforeach

                                @php
                                    $vektorV = [];
                                @endphp
                                @foreach ($product as $item)
                                    @php
                                        array_push($vektorV, (4**$bobotVald[0]) * (ketahanan($item->ketahanan) ** $bobotVald[1]) * (wpHarga($item->harga) ** (-$bobotVald[2])) * (jumlahBeli($item->transaction_item_sum_quantity) ** $bobotVald[3]));
                                    @endphp
                                @endforeach

                                @php
                                    $result = [];
                                @endphp
                                @foreach ($product as $item => $valcount)
                                    @php
                                        $result[$loop->iteration - 1] = [
                                            'product' => $valcount,
                                            'vektor_v' => $vektorV[$item]/array_sum($vektorV)
                                        ];
                                    @endphp
                                @endforeach

                                @php
                                    $result = collect($result)->sortByDesc('vektor_v')->values()->all();
                                @endphp

                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0" rowspan="2">
                                                <h6 class="fw-semibold mb-0">Ranking</h6>
                                            </th>
                                            <th class="border-bottom-0" rowspan="2">
                                                <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                            </th>
                                            <th>Nilai Perhitungan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($result as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['product']->name }}</td>
                                                <td>{{ number_format($item['vektor_v'], 3) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                {{-- {{ $products->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
